<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PageVisit;
use App\Models\Contact;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Display portfolio landing page with analytics
     */
    public function index()
    {
        // Track page visit
        $this->trackPageVisit(request(), 'portfolio.index');
        
        // Get cached analytics data
        $analytics = $this->getPortfolioAnalytics();
        
        // Featured projects data
        $featuredProjects = $this->getFeaturedProjects();
        
        // Skills and technologies
        $skillsMatrix = $this->getSkillsMatrix();

        return Inertia::render('landing/index', [
            'analytics' => $analytics,
            'featuredProjects' => $featuredProjects,
            'skillsMatrix' => $skillsMatrix,
            'meta' => [
                'title' => 'Professional Portfolio - Full Stack Developer',
                'description' => 'Expert in Laravel/PHP, Vue.js, and ERP system development. Specialized in Buying House ERP solutions, mobile applications, and enterprise software.',
                'keywords' => 'Laravel Developer, Vue.js, ERP Systems, Buying House, Full Stack Developer'
            ]
        ]);
    }

    /**
     * Get portfolio analytics data
     */
    public function getAnalytics()
    {
        $analytics = Cache::remember('portfolio_analytics', 3600, function () {
            return [
                'portfolio_stats' => [
                    'total_projects' => 25,
                    'active_projects' => 3,
                    'completed_projects' => 22,
                    'technologies_used' => 15,
                    'years_experience' => 8,
                    'client_satisfaction' => 4.8
                ],
                'current_month' => [
                    'portfolio_visits' => PageVisit::whereMonth('created_at', now()->month)->count(),
                    'project_inquiries' => Contact::whereMonth('created_at', now()->month)->count(),
                    'new_contacts' => Contact::whereMonth('created_at', now()->month)->distinct('email')->count(),
                    'proposal_requests' => Contact::whereMonth('created_at', now()->month)
                        ->where('subject', 'like', '%proposal%')->count()
                ],
                'popular_projects' => $this->getPopularProjects(),
                'visitor_stats' => $this->getVisitorStats(),
                'technology_interest' => $this->getTechnologyInterest()
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $analytics
        ]);
    }

    /**
     * Get projects with filtering and pagination
     */
    public function getProjects(Request $request)
    {
        $projects = $this->getProjectsData();
        
        // Apply filters
        if ($request->has('category')) {
            $projects = array_filter($projects, function($project) use ($request) {
                return isset($project['category']) && 
                       stripos($project['category'], $request->category) !== false;
            });
        }

        if ($request->has('technology')) {
            $projects = array_filter($projects, function($project) use ($request) {
                return isset($project['tags']) && 
                       in_array($request->technology, $project['tags']);
            });
        }

        // Pagination
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 10);
        $offset = ($page - 1) * $limit;
        
        $paginatedProjects = array_slice($projects, $offset, $limit);
        $total = count($projects);

        return response()->json([
            'success' => true,
            'data' => $paginatedProjects,
            'meta' => [
                'pagination' => [
                    'current_page' => $page,
                    'per_page' => $limit,
                    'total' => $total,
                    'total_pages' => ceil($total / $limit)
                ]
            ]
        ]);
    }

    /**
     * Get single project details
     */
    public function getProject($id)
    {
        $projects = $this->getProjectsData();
        $project = collect($projects)->firstWhere('id', $id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found'
            ], 404);
        }

        // Track project view
        $this->trackPageVisit(request(), 'project.view', $id);

        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }

    /**
     * Get projects by technology
     */
    public function getProjectsByTechnology($technology)
    {
        $projects = $this->getProjectsData();
        
        $filteredProjects = array_filter($projects, function($project) use ($technology) {
            return isset($project['tags']) && 
                   in_array($technology, $project['tags']);
        });

        return response()->json([
            'success' => true,
            'data' => array_values($filteredProjects)
        ]);
    }

    /**
     * Submit contact form
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'project_interest' => 'nullable|string'
        ]);

        $contact = Contact::create($validated);

        // Send notification email (implement as needed)
        // $this->sendContactNotification($contact);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message. I will get back to you soon!',
            'data' => $contact
        ]);
    }

    /**
     * Track page visits for analytics
     */
    protected function trackPageVisit(Request $request, $page, $projectId = null)
    {
        PageVisit::create([
            'page' => $page,
            'project_id' => $projectId,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'created_at' => now()
        ]);
    }

    /**
     * Get portfolio analytics data
     */
    protected function getPortfolioAnalytics()
    {
        return [
            'total_visits' => PageVisit::count(),
            'monthly_visits' => PageVisit::whereMonth('created_at', now()->month)->count(),
            'weekly_visits' => PageVisit::whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])->count(),
            'today_visits' => PageVisit::whereDate('created_at', today())->count()
        ];
    }

    /**
     * Get featured projects data
     */
    protected function getFeaturedProjects()
    {
        return [
            [
                'id' => 1,
                'title' => 'Buying House ERP System',
                'category' => 'Enterprise Resource Planning',
                'description' => 'Comprehensive ERP solution for garment buying houses with order management, production monitoring, and financial integration.',
                'tags' => ['Laravel/PHP', 'Vue.js', 'MySQL', 'Tailwind CSS'],
                'featured' => true,
                'completed_at' => '2024-10-01',
                'client_satisfaction' => 4.9
            ],
            [
                'id' => 2,
                'title' => 'Bhutan Waste Bank App',
                'category' => 'Mobile Application',
                'description' => 'Cross-platform mobile app for environmental waste management with real-time tracking and reward system.',
                'tags' => ['Flutter', 'Laravel API', 'MySQL'],
                'featured' => true,
                'completed_at' => '2024-08-15',
                'client_satisfaction' => 4.8
            ],
            [
                'id' => 3,
                'title' => 'Quality Inspection Mobile App',
                'category' => 'Mobile Application',
                'description' => 'Factory quality control application with offline capabilities and automated reporting.',
                'tags' => ['Flutter', 'Ionic', 'Laravel API'],
                'featured' => true,
                'completed_at' => '2024-09-20',
                'client_satisfaction' => 4.7
            ]
        ];
    }

    /**
     * Get skills and technology matrix
     */
    protected function getSkillsMatrix()
    {
        return [
            'backend' => [
                'PHP/Laravel' => ['level' => 'Expert', 'years' => 8],
                'MySQL' => ['level' => 'Expert', 'years' => 8],
                'PostgreSQL' => ['level' => 'Advanced', 'years' => 5],
                'Redis' => ['level' => 'Advanced', 'years' => 4]
            ],
            'frontend' => [
                'Vue.js' => ['level' => 'Advanced', 'years' => 5],
                'JavaScript' => ['level' => 'Expert', 'years' => 8],
                'Tailwind CSS' => ['level' => 'Advanced', 'years' => 3],
                'jQuery' => ['level' => 'Expert', 'years' => 8]
            ],
            'mobile' => [
                'Flutter' => ['level' => 'Advanced', 'years' => 3],
                'Ionic' => ['level' => 'Intermediate', 'years' => 2]
            ],
            'specializations' => [
                'ERP Systems',
                'E-commerce Platforms',
                'Mobile Applications',
                'API Development',
                'Database Design'
            ]
        ];
    }

    /**
     * Get comprehensive projects data
     */
    protected function getProjectsData()
    {
        return [
            [
                'id' => 1,
                'title' => 'Buying House ERP System',
                'slug' => 'buying-house-erp-system',
                'category' => 'Enterprise Resource Planning',
                'description' => 'Comprehensive ERP solution for garment buying houses',
                'tags' => ['Laravel/PHP', 'Vue.js', 'MySQL', 'Tailwind CSS'],
                'featured' => true,
                'status' => 'completed',
                'completion_date' => '2024-10-01',
                'project_scale' => 'Enterprise (1000+ users)',
                'implementation_time' => '8-12 months',
                'roi' => '40% operational efficiency improvement'
            ],
            [
                'id' => 2,
                'title' => 'Point of Sale (POS) System',
                'slug' => 'pos-system',
                'category' => 'Retail Management',
                'description' => 'Comprehensive retail POS solution',
                'tags' => ['Laravel/PHP', 'JavaScript', 'jQuery', 'MySQL'],
                'featured' => true,
                'status' => 'completed',
                'completion_date' => '2024-07-15'
            ],
            [
                'id' => 3,
                'title' => 'Accounting Software',
                'slug' => 'accounting-software',
                'category' => 'Financial Management',
                'description' => 'Complete accounting solution for small businesses',
                'tags' => ['Laravel/PHP', 'Vue.js', 'MySQL'],
                'featured' => true,
                'status' => 'completed',
                'completion_date' => '2024-06-10'
            ],
            [
                'id' => 4,
                'title' => 'E-commerce Platform',
                'slug' => 'ecommerce-platform',
                'category' => 'Online Retail',
                'description' => 'Multi-vendor e-commerce marketplace',
                'tags' => ['Laravel/PHP', 'Vue.js', 'MySQL'],
                'featured' => true,
                'status' => 'completed',
                'completion_date' => '2024-05-20'
            ],
            [
                'id' => 5,
                'title' => 'Bhutan Waste Bank App',
                'slug' => 'bhutan-waste-bank-app',
                'category' => 'Mobile Application',
                'description' => 'Environmental waste management mobile app',
                'tags' => ['Flutter', 'Laravel API', 'MySQL'],
                'featured' => true,
                'status' => 'completed',
                'completion_date' => '2024-08-15'
            ],
            [
                'id' => 6,
                'title' => 'Quality Inspection App',
                'slug' => 'quality-inspection-app',
                'category' => 'Mobile Application',
                'description' => 'Factory quality control mobile application',
                'tags' => ['Flutter', 'Ionic', 'Laravel API'],
                'featured' => true,
                'status' => 'completed',
                'completion_date' => '2024-09-20'
            ]
        ];
    }

    /**
     * Get popular projects based on views
     */
    protected function getPopularProjects()
    {
        return PageVisit::select('project_id', DB::raw('count(*) as views'))
            ->whereNotNull('project_id')
            ->groupBy('project_id')
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get()
            ->map(function($item) {
                $projects = $this->getProjectsData();
                $project = collect($projects)->firstWhere('id', $item->project_id);
                return [
                    'project' => $project['title'] ?? 'Unknown Project',
                    'views' => $item->views,
                    'project_id' => $item->project_id
                ];
            });
    }

    /**
     * Get visitor statistics
     */
    protected function getVisitorStats()
    {
        return [
            'total_visits' => PageVisit::count(),
            'unique_ips' => PageVisit::distinct('ip_address')->count(),
            'this_month' => PageVisit::whereMonth('created_at', now()->month)->count(),
            'last_month' => PageVisit::whereMonth('created_at', now()->subMonth()->month)->count()
        ];
    }

    /**
     * Get technology interest based on project views
     */
    protected function getTechnologyInterest()
    {
        $projects = $this->getProjectsData();
        $techInterest = [];

        foreach ($projects as $project) {
            foreach ($project['tags'] as $tech) {
                if (!isset($techInterest[$tech])) {
                    $techInterest[$tech] = 0;
                }
                $techInterest[$tech]++;
            }
        }

        arsort($techInterest);
        return array_slice($techInterest, 0, 10, true);
    }
}
