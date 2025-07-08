<?php
use App\Http\Controllers\PageVisitController;
use App\Http\Controllers\PortfolioController;

// Authentication route
Route::post('/login', 'App\Http\Controllers\UserController@authenticate');

// Portfolio API Routes
Route::prefix('portfolio')->group(function () {
    // Projects endpoints
    Route::get('/projects', [PortfolioController::class, 'getProjects'])->name('api.portfolio.projects');
    Route::get('/projects/{id}', [PortfolioController::class, 'getProject'])->name('api.portfolio.project.show');
    Route::get('/projects/slug/{slug}', [PortfolioController::class, 'getProjectBySlug'])->name('api.portfolio.project.slug');
    Route::get('/projects/technology/{technology}', [PortfolioController::class, 'getProjectsByTechnology'])->name('api.portfolio.projects.technology');
    Route::get('/projects/featured', [PortfolioController::class, 'getFeaturedProjects'])->name('api.portfolio.projects.featured');
    
    // Analytics endpoints
    Route::get('/analytics', [PortfolioController::class, 'getAnalytics'])->name('api.portfolio.analytics');
    Route::post('/analytics/visit', [PortfolioController::class, 'trackVisit'])->name('api.portfolio.analytics.visit');
    
    // Skills and technologies
    Route::get('/skills', [PortfolioController::class, 'getSkills'])->name('api.portfolio.skills');
    Route::get('/skills/{id}', [PortfolioController::class, 'getSkill'])->name('api.portfolio.skill.show');
    Route::get('/skills/{id}/projects', [PortfolioController::class, 'getProjectsBySkill'])->name('api.portfolio.skill.projects');
    
    // Contact and inquiries
    Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('api.portfolio.contact.submit');
    Route::get('/testimonials', [PortfolioController::class, 'getTestimonials'])->name('api.portfolio.testimonials');
    Route::post('/testimonials', [PortfolioController::class, 'submitTestimonial'])->name('api.portfolio.testimonials.submit');
});

// Legacy visitor tracking routes (maintaining backward compatibility)
Route::post('/visitor', [PageVisitController::class, 'store']);
Route::get('/visitor/count', [PageVisitController::class, 'count']);

// ERP API Routes (for future implementation)
Route::prefix('erp')->middleware(['api.auth'])->group(function () {
    // Order Management
    Route::apiResource('orders', 'App\Http\Controllers\OrderController');
    Route::post('/orders/{id}/confirm', 'App\Http\Controllers\OrderController@confirm');
    Route::post('/orders/{id}/amend', 'App\Http\Controllers\OrderController@amend');
    
    // Production Monitoring
    Route::apiResource('production', 'App\Http\Controllers\ProductionController');
    Route::get('/production/{id}/status', 'App\Http\Controllers\ProductionController@status');
    
    // Supplier Management
    Route::apiResource('suppliers', 'App\Http\Controllers\SupplierController');
    Route::get('/suppliers/{id}/performance', 'App\Http\Controllers\SupplierController@performance');
    
    // Financial Management
    Route::apiResource('invoices', 'App\Http\Controllers\InvoiceController');
    Route::get('/financial/reports', 'App\Http\Controllers\FinancialController@reports');
    
    // Inventory Management
    Route::apiResource('inventory', 'App\Http\Controllers\InventoryController');
    Route::get('/inventory/low-stock', 'App\Http\Controllers\InventoryController@lowStock');
    
    // Reporting and Analytics
    Route::get('/reports/dashboard', 'App\Http\Controllers\ReportController@dashboard');
    Route::get('/reports/orders', 'App\Http\Controllers\ReportController@orders');
    Route::get('/reports/production', 'App\Http\Controllers\ReportController@production');
    Route::get('/reports/financial', 'App\Http\Controllers\ReportController@financial');
});

// Authenticated API routes
Route::middleware(['api.auth'])->group(function () {
    Route::post('/secure', fn () => response()->json(['message' => 'Authorized!']));
    
    // Admin portfolio management (if needed)
    Route::prefix('admin/portfolio')->group(function () {
        Route::post('/projects', [PortfolioController::class, 'createProject'])->name('api.admin.portfolio.projects.create');
        Route::put('/projects/{id}', [PortfolioController::class, 'updateProject'])->name('api.admin.portfolio.projects.update');
        Route::delete('/projects/{id}', [PortfolioController::class, 'deleteProject'])->name('api.admin.portfolio.projects.delete');
        Route::get('/contacts', [PortfolioController::class, 'getContacts'])->name('api.admin.portfolio.contacts');
        Route::put('/contacts/{id}', [PortfolioController::class, 'updateContactStatus'])->name('api.admin.portfolio.contacts.update');
    });
});
