# Buying House ERP System Documentation

## Overview

The **Buying House ERP System** is a comprehensive enterprise resource planning solution designed specifically for garment buying houses. It streamlines operations from order management through shipment, providing end-to-end visibility and control over the entire supply chain process.

## Table of Contents

1. [System Architecture](#system-architecture)
2. [Core Modules](#core-modules)
3. [API Documentation](#api-documentation)
4. [Installation & Setup](#installation--setup)
5. [User Roles & Permissions](#user-roles--permissions)
6. [Workflow Processes](#workflow-processes)
7. [Integration Points](#integration-points)
8. [Troubleshooting](#troubleshooting)

## System Architecture

### Technology Stack
- **Backend**: Laravel/PHP 11.x
- **Frontend**: Vue.js 3 with Composition API
- **Database**: MySQL 8.0+
- **Authentication**: JWT (JSON Web Tokens)
- **Real-time**: Laravel Broadcasting with Pusher
- **File Storage**: AWS S3 / Local Storage
- **Queue Management**: Redis/Database

### Core Dependencies
- **Inertia.js**: Full-stack framework for SPAs
- **Tailwind CSS**: Utility-first CSS framework
- **shadcn-vue**: Component library
- **Laravel Sanctum**: API authentication

## Core Modules

### 1. Order Management Module

**Purpose**: Manage buyer orders from inquiry through shipment completion.

#### Key Features
- **Buyer Order Entry**: Complete order specifications including style details, quantities, colors, and sizes
- **Sample Development Tracking**: Monitor sample creation, approval, and revision cycles
- **Order Confirmation**: Automated confirmation workflow with buyer approval
- **Style-wise Breakdown**: Detailed color and size matrix management
- **Order Amendments**: Handle order changes with proper approval workflow

#### Database Schema
```sql
-- Orders Table
orders (
    id, buyer_id, order_number, order_date, delivery_date, 
    status, total_quantity, total_value, currency, 
    created_at, updated_at
)

-- Order Items Table
order_items (
    id, order_id, style_number, description, quantity, 
    unit_price, total_price, fabric_type, created_at, updated_at
)

-- Order Color Size Breakdown
order_breakdowns (
    id, order_item_id, color, size, quantity, created_at, updated_at
)
```

#### API Endpoints
```php
// Order Management APIs
POST   /api/orders                    // Create new order
GET    /api/orders                    // List orders with pagination
GET    /api/orders/{id}               // Get order details
PUT    /api/orders/{id}               // Update order
DELETE /api/orders/{id}               // Cancel order
POST   /api/orders/{id}/confirm       // Confirm order
POST   /api/orders/{id}/amend         // Create order amendment
```

### 2. Merchandising Management Module

**Purpose**: Handle product development, costing, and procurement planning.

#### Key Features
- **Bill of Materials (BOM)**: Complete material specifications per style
- **Costing Sheet Preparation**: Detailed cost breakdown including materials, labor, and overheads
- **Supplier Quotation Management**: Compare and manage supplier quotes
- **Sample Approval Status**: Track sample approval workflow
- **Procurement Request Generation**: Automatic generation based on confirmed orders

#### Workflow Process
1. **Style Development**: Create new styles with specifications
2. **BOM Creation**: Define materials, quantities, and specifications
3. **Costing**: Calculate production costs with markup
4. **Supplier Quotation**: Request and compare quotes
5. **Approval**: Sample and costing approval workflow
6. **Procurement Planning**: Generate material requirements

### 3. Supplier & Vendor Management Module

**Purpose**: Comprehensive supplier relationship and procurement management.

#### Key Features
- **Supplier Directory**: Centralized supplier database with capabilities
- **Price Negotiation Tracking**: Record negotiation history and agreements
- **Lead Time Monitoring**: Track supplier performance and delivery times
- **Purchase Order Management**: Complete PO lifecycle management
- **Delivery Follow-ups**: Automated reminders and tracking

#### Supplier Performance Metrics
- On-time delivery rate
- Quality rating
- Price competitiveness
- Communication responsiveness
- Compliance ratings

### 4. Production Monitoring Module

**Purpose**: Real-time production tracking and quality management.

#### Key Features
- **Factory Assignment**: Allocate orders to factories based on capacity
- **Capacity Planning**: Manage factory workload and scheduling
- **Pre-production Checklist**: Ensure all requirements are met before production
- **Inline Monitoring**: Real-time production status updates
- **Quality Control**: AQL inspection reports and defect tracking
- **Shipment Readiness**: Monitor completion status

#### Production Stages
1. **Order Allocation**: Assign to factory
2. **Pre-production**: Material availability, samples, approvals
3. **Cutting**: Fabric cutting and preparation
4. **Sewing**: Production line monitoring
5. **Finishing**: Final processing and packing
6. **Quality Control**: Final inspection
7. **Shipment Ready**: Ready for dispatch

### 5. Inventory & Material Tracking Module

**Purpose**: Comprehensive inventory management for all materials.

#### Key Features
- **Multi-location Inventory**: Track stock across multiple warehouses
- **Material Categories**: Fabric, trims, accessories, packaging
- **Sample Material Requisition**: Controlled sample material allocation
- **Material Issue Register**: Track material consumption
- **Automatic Reorder Points**: Alert when stock reaches minimum levels
- **Warehouse Integration**: Real-time stock updates

#### Inventory Categories
- **Fabrics**: Main fabric, lining, interfacing
- **Trims**: Buttons, zippers, labels, threads
- **Accessories**: Hangers, poly bags, cartons
- **Packaging**: Export cartons, tissue paper, size stickers

### 6. Logistics & Shipment Module

**Purpose**: Complete shipment and export documentation management.

#### Key Features
- **Multi-modal Shipping**: Sea freight, air freight, courier services
- **Documentation**: Commercial invoice, packing list, bill of lading
- **Export Compliance**: LC terms, certificate of origin, GSP forms
- **Payment Tracking**: LC/TT payment status monitoring
- **Delivery Confirmation**: Buyer receipt confirmation

#### Shipment Process
1. **Booking**: Reserve shipping space
2. **Documentation**: Prepare export documents
3. **Loading**: Container loading supervision
4. **Customs**: Export customs clearance
5. **Transit**: Track shipment progress
6. **Delivery**: Buyer receipt and payment

### 7. Finance & Accounts Module

**Purpose**: Complete financial management and accounting system.

#### Key Features
- **Cost Management**: Detailed cost tracking per order
- **Vendor Payments**: Accounts payable management
- **Buyer Receivables**: Invoice generation and collection
- **Commission Tracking**: Agent and staff commission calculation
- **Financial Reporting**: P&L, balance sheet, cash flow
- **Budget Management**: Department-wise budget allocation

#### Financial Workflows
- **Order Costing**: Material + labor + overhead costs
- **Invoice Generation**: Automated buyer invoicing
- **Payment Processing**: Bank reconciliation
- **Commission Calculation**: Performance-based calculations
- **Financial Reporting**: Real-time financial dashboards

### 8. CRM (Customer Relationship Management)

**Purpose**: Manage buyer relationships and communication.

#### Key Features
- **Buyer Profiles**: Complete buyer information and preferences
- **Communication History**: Email, call logs, meeting notes
- **Feedback Management**: Buyer feedback and issue resolution
- **Visit Reports**: Buyer visit planning and reporting
- **Opportunity Tracking**: Sales pipeline management

### 9. HR & Admin Module

**Purpose**: Internal staff management and administration.

#### Key Features
- **Employee Management**: Complete HR information system
- **Attendance Tracking**: Biometric integration
- **Leave Management**: Leave application and approval
- **Task Assignment**: Project and task management
- **Expense Management**: Employee expense claims

### 10. Reporting & Analytics Module

**Purpose**: Business intelligence and performance monitoring.

#### Key Reports
- **Order Status Dashboard**: Real-time order tracking
- **Shipment Schedule**: Delivery timeline monitoring
- **Factory Performance**: Production efficiency metrics
- **Financial Analysis**: Profit/loss per order, buyer, factory
- **Buyer Analytics**: Buyer performance and trends

## API Documentation

### Authentication
All API endpoints require JWT authentication:
```
Authorization: Bearer <jwt_token>
```

### Common Response Format
```json
{
    "success": true,
    "message": "Operation successful",
    "data": {},
    "meta": {
        "pagination": {
            "current_page": 1,
            "per_page": 15,
            "total": 100
        }
    }
}
```

### Error Handling
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "field_name": ["Error message"]
    }
}
```

## Installation & Setup

### System Requirements
- PHP 8.2+
- MySQL 8.0+
- Node.js 18+
- Composer 2.x
- Redis (for queues)

### Installation Steps
```bash
# Clone repository
git clone <repository-url>
cd buying-house-erp

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Build assets
npm run build

# Start services
php artisan serve
```

### Environment Configuration
```env
APP_NAME="Buying House ERP"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=buying_house_erp
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=redis
BROADCAST_DRIVER=pusher
```

## User Roles & Permissions

### Role Hierarchy
1. **Super Admin**: Full system access
2. **Management**: Department oversight
3. **Merchandiser**: Order and product management
4. **Production Manager**: Production monitoring
5. **Accounts**: Financial operations
6. **Data Entry**: Limited data input access

### Permission Matrix
| Module | Super Admin | Management | Merchandiser | Production | Accounts | Data Entry |
|--------|-------------|------------|--------------|------------|----------|------------|
| Orders | Full | View/Edit | Full | View | View | Create |
| Finance | Full | View | View | None | Full | None |
| Production | Full | View/Edit | View | Full | None | View |
| Reports | Full | Full | Limited | Limited | Full | None |

## Workflow Processes

### Order Processing Workflow
1. **Inquiry Received** → Merchandiser creates initial order
2. **Sample Development** → Technical team develops samples
3. **Costing** → Accounts team prepares cost sheet
4. **Order Confirmation** → Buyer approves order terms
5. **Production Planning** → Production team allocates to factory
6. **Material Procurement** → Purchase materials based on BOM
7. **Production Monitoring** → Track production progress
8. **Quality Control** → Inspect finished goods
9. **Shipment** → Prepare export documentation
10. **Delivery & Payment** → Track delivery and payment

### Sample Approval Workflow
1. **Development Request** → From merchandiser
2. **Material Allocation** → Inventory team provides materials
3. **Sample Production** → Factory creates samples
4. **Internal QC** → Quality check before submission
5. **Buyer Submission** → Send to buyer for approval
6. **Feedback** → Receive buyer comments
7. **Revision** → Make changes if required
8. **Final Approval** → Buyer confirms sample

## Integration Points

### External Integrations
- **Banking APIs**: For payment processing
- **Shipping APIs**: DHL, FedEx, UPS tracking
- **ERP Connectors**: SAP, Oracle integration
- **Email Services**: SMTP, SendGrid
- **SMS Gateway**: For notifications
- **Document Storage**: AWS S3, Google Drive

### Internal APIs
- **Mobile App API**: For quality inspection app
- **Reporting API**: For business intelligence
- **Notification API**: Real-time alerts
- **File Upload API**: Document management

## Performance Optimization

### Database Optimization
- Proper indexing on frequently queried columns
- Query optimization and caching
- Database connection pooling
- Regular maintenance and cleanup

### Caching Strategy
- Redis for session and cache storage
- API response caching
- Database query result caching
- Static asset caching

### Security Measures
- JWT token authentication
- Role-based access control
- Input validation and sanitization
- SQL injection prevention
- XSS protection
- CSRF protection

## Troubleshooting

### Common Issues

#### 1. Database Connection Issues
```bash
# Check database configuration
php artisan config:cache
php artisan migrate:status
```

#### 2. Authentication Problems
```bash
# Clear JWT tokens
php artisan jwt:secret
php artisan config:cache
```

#### 3. Performance Issues
```bash
# Clear all caches
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### 4. Queue Issues
```bash
# Restart queue workers
php artisan queue:restart
php artisan queue:work
```

## Support & Maintenance

### Regular Maintenance Tasks
- Daily database backup
- Weekly performance monitoring
- Monthly security updates
- Quarterly feature reviews

### Support Channels
- **Technical Support**: tech-support@company.com
- **User Training**: training@company.com
- **Bug Reports**: bugs@company.com
- **Feature Requests**: features@company.com

### Version Control
- Semantic versioning (MAJOR.MINOR.PATCH)
- Git-based version control
- Automated testing pipeline
- Staged deployment process

---

**Last Updated**: December 2024  
**Version**: 2.1.0  
**Maintained by**: Development Team