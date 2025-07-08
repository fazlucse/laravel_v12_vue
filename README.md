# Professional Portfolio & ERP System

## Overview

This is a comprehensive **Laravel + Vue.js** application that combines a professional portfolio showcase with a powerful **Buying House ERP system**. Built with modern technologies and best practices, it provides a complete solution for both personal branding and enterprise resource planning.

## 🚀 Key Features

### Portfolio Management System
- **Dynamic Project Showcase**: Interactive galleries with detailed project information
- **Skills & Technology Matrix**: Comprehensive tracking of expertise and experience
- **Analytics Dashboard**: Visitor tracking, engagement metrics, and performance insights
- **Contact Management**: Lead generation and inquiry handling
- **SEO Optimized**: Search engine friendly structure with meta tags
- **Responsive Design**: Mobile-first, cross-device compatibility

### Buying House ERP System
- **Order Management**: Complete order lifecycle from inquiry to shipment
- **Production Monitoring**: Real-time production tracking and quality control
- **Supplier Management**: Vendor relationships and procurement tracking
- **Financial Management**: Accounting, invoicing, and commission tracking
- **Inventory Control**: Multi-location stock management
- **Mobile Integration**: Quality inspection mobile apps
- **Reporting & Analytics**: Comprehensive business intelligence

## 🛠 Technology Stack

### Backend
- **Laravel 11.x** - PHP framework with robust features
- **MySQL 8.0+** - Primary database
- **Redis** - Caching and session management
- **JWT Authentication** - Secure API authentication

### Frontend
- **Vue.js 3** - Progressive JavaScript framework with Composition API
- **Inertia.js** - Full-stack framework for SPAs
- **Tailwind CSS** - Utility-first CSS framework
- **shadcn-vue** - Modern component library

### Mobile Development
- **Flutter** - Cross-platform mobile applications
- **Ionic** - Hybrid mobile app development

### DevOps & Tools
- **Git** - Version control
- **Composer** - PHP dependency management
- **NPM** - Node.js package management
- **Vite** - Fast build tool and dev server

## 📋 System Requirements

- **PHP**: 8.2 or higher
- **MySQL**: 8.0 or higher
- **Node.js**: 18 or higher
- **Composer**: 2.x
- **Redis**: For caching and queues (optional but recommended)

## 🚀 Quick Start

### 1. Clone the Repository
```bash
git clone <repository-url>
cd portfolio-erp-system
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your .env file with database credentials
```

### 4. Database Setup
```bash
# Run migrations
php artisan migrate

# Seed the database (optional)
php artisan db:seed
```

### 5. Build Assets
```bash
# For development
npm run dev

# For production
npm run build
```

### 6. Start the Application
```bash
# Start the Laravel development server
php artisan serve

# The application will be available at http://localhost:8000
```

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── PortfolioController.php     # Portfolio management
│   │   ├── PersonController.php        # Contact management
│   │   └── Auth/                       # Authentication
│   ├── Models/
│   │   ├── Contact.php                 # Contact model
│   │   ├── PageVisit.php              # Analytics tracking
│   │   └── User.php                    # User management
│   └── ...
├── resources/
│   ├── js/
│   │   ├── pages/
│   │   │   ├── landing/                # Portfolio pages
│   │   │   │   ├── index.vue          # Portfolio homepage
│   │   │   │   ├── project.vue        # Project showcase
│   │   │   │   └── about.vue          # About section
│   │   │   └── persons/               # Contact management
│   │   ├── components/                # Reusable components
│   │   └── layouts/                   # Application layouts
│   └── views/                         # Blade templates
├── routes/
│   ├── web.php                        # Web routes
│   └── api.php                        # API routes
├── database/
│   ├── migrations/                    # Database migrations
│   └── seeders/                       # Database seeders
├── ERP_DOCUMENTATION.md               # Comprehensive ERP documentation
├── PORTFOLIO_DOCUMENTATION.md         # Portfolio system documentation
└── README.md                          # This file
```

## 🎯 Core Modules

### Portfolio System

#### 1. Project Showcase
- Dynamic project galleries with filtering and search
- Detailed project information with technology stacks
- Client testimonials and case studies
- Mobile-responsive design

#### 2. Analytics & Tracking
- Visitor analytics and engagement metrics
- Project popularity tracking
- Technology interest analysis
- Contact conversion tracking

#### 3. Contact Management
- Lead capture and management
- Email notifications and responses
- Inquiry categorization and tracking

### ERP System Modules

#### 1. Order Management
- Complete order lifecycle tracking
- Sample development and approval
- Order amendments and modifications
- Style-wise color and size breakdown

#### 2. Production Monitoring
- Factory assignment and capacity planning
- Real-time production status tracking
- Quality control and inspection reports
- Shipment readiness monitoring

#### 3. Financial Management
- Cost tracking and analysis
- Invoice generation and management
- Commission calculations
- Financial reporting and analytics

#### 4. Supplier Management
- Vendor database and relationship tracking
- Purchase order management
- Price negotiation history
- Delivery performance monitoring

## 🔌 API Documentation

### Portfolio APIs

#### Get Projects
```http
GET /api/portfolio/projects
```

**Parameters:**
- `category` (optional): Filter by project category
- `technology` (optional): Filter by technology stack
- `limit` (optional): Number of results per page (default: 10)
- `page` (optional): Page number (default: 1)

#### Get Project Details
```http
GET /api/portfolio/projects/{id}
```

#### Submit Contact Form
```http
POST /api/portfolio/contact
```

**Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "subject": "Project Inquiry",
    "message": "I'm interested in your ERP solution...",
    "project_interest": "Buying House ERP"
}
```

#### Get Analytics
```http
GET /api/portfolio/analytics
```

**Response:**
```json
{
    "success": true,
    "data": {
        "portfolio_stats": {
            "total_projects": 25,
            "active_projects": 3,
            "completed_projects": 22,
            "years_experience": 8,
            "client_satisfaction": 4.8
        },
        "current_month": {
            "portfolio_visits": 450,
            "project_inquiries": 12,
            "new_contacts": 8
        }
    }
}
```

## 📊 Featured Projects

### 1. Buying House ERP System
- **Technology**: Laravel/PHP, Vue.js, MySQL, Tailwind CSS
- **Scale**: Enterprise-level (1000+ users)
- **Features**: Complete order-to-shipment management
- **ROI**: 40% operational efficiency improvement

### 2. Mobile Applications
- **Bhutan Waste Bank App**: Environmental waste management (Flutter + Laravel API)
- **Quality Inspection App**: Factory quality control (Flutter/Ionic + Laravel API)

### 3. Business Solutions
- **Point of Sale System**: Retail management solution
- **Accounting Software**: Financial management for SMEs
- **E-commerce Platform**: Multi-vendor marketplace

## 🔧 Configuration

### Environment Variables
```env
# Application
APP_NAME="Portfolio & ERP System"
APP_ENV=production
APP_KEY=base64:your-app-key
APP_DEBUG=false
APP_URL=https://your-domain.com

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_erp
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Cache & Sessions
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## 🚀 Deployment

### Production Deployment Steps

1. **Server Setup**
   ```bash
   # Update system packages
   sudo apt update && sudo apt upgrade -y
   
   # Install required packages
   sudo apt install nginx mysql-server redis-server php8.2-fpm
   ```

2. **Application Deployment**
   ```bash
   # Clone and setup application
   git clone <repository-url> /var/www/portfolio-erp
   cd /var/www/portfolio-erp
   
   # Install dependencies
   composer install --optimize-autoloader --no-dev
   npm ci --production
   npm run build
   
   # Set permissions
   sudo chown -R www-data:www-data /var/www/portfolio-erp
   sudo chmod -R 755 /var/www/portfolio-erp/storage
   ```

3. **Database Migration**
   ```bash
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

### Performance Optimization

- **Caching**: Redis for sessions, cache, and queues
- **Database**: Proper indexing and query optimization
- **Assets**: Minification and compression
- **CDN**: Static asset delivery optimization

## 📈 Analytics & Monitoring

### Key Metrics Tracked
- **Portfolio Visits**: Page views and unique visitors
- **Project Engagement**: Time spent on project pages
- **Contact Conversions**: Inquiry to project ratio
- **Technology Interest**: Popular technology stacks
- **Geographic Distribution**: Visitor locations

### Performance Monitoring
- **Application Performance**: Response times and error rates
- **Database Performance**: Query optimization and slow query monitoring
- **Server Metrics**: CPU, memory, and disk usage
- **Uptime Monitoring**: Service availability tracking

## 🛡 Security Features

- **Authentication**: JWT-based API authentication
- **Authorization**: Role-based access control
- **Input Validation**: Comprehensive request validation
- **SQL Injection Prevention**: Eloquent ORM protection
- **XSS Protection**: Output escaping and sanitization
- **CSRF Protection**: Cross-site request forgery prevention

## 🧪 Testing

### Running Tests
```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature

# Run with coverage
php artisan test --coverage
```

### Test Coverage
- **Unit Tests**: Model and service layer testing
- **Feature Tests**: API endpoint and integration testing
- **Browser Tests**: Frontend functionality testing

## 📚 Documentation

### Comprehensive Documentation Files
- **[ERP_DOCUMENTATION.md](./ERP_DOCUMENTATION.md)**: Complete ERP system documentation
- **[PORTFOLIO_DOCUMENTATION.md](./PORTFOLIO_DOCUMENTATION.md)**: Portfolio system documentation

### API Documentation
- **Postman Collection**: Available for API testing
- **OpenAPI Specification**: Swagger documentation for all endpoints

## 🤝 Contributing

### Development Workflow
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Code Standards
- **PSR-12**: PHP coding standards
- **ESLint**: JavaScript code quality
- **Prettier**: Code formatting
- **PHPStan**: Static analysis for PHP

## 📞 Support & Contact

### Technical Support
- **Email**: tech-support@your-domain.com
- **Documentation**: Comprehensive guides and API docs
- **Issue Tracking**: GitHub Issues for bug reports

### Business Inquiries
- **Portfolio Contact**: Available through the contact form
- **ERP Solutions**: Custom implementation and consulting
- **Mobile App Development**: Cross-platform solutions

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Laravel Community**: For the excellent framework and ecosystem
- **Vue.js Team**: For the progressive JavaScript framework
- **Tailwind CSS**: For the utility-first CSS framework
- **Inertia.js**: For seamless SPA development

---

**Version**: 3.0.0  
**Last Updated**: December 2024  
**Maintainer**: Development Team

For detailed documentation about specific modules, please refer to the dedicated documentation files:
- [ERP System Documentation](./ERP_DOCUMENTATION.md)
- [Portfolio Management Documentation](./PORTFOLIO_DOCUMENTATION.md)
