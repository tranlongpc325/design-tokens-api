# Dynamic Design Tokens API (Laravel Backend)

A high-performance, lightweight RESTful API built with Laravel 13 designed to manage and serve architectural design tokens (UI themes, color palettes, typographic variables, and spatial grids) to modern decoupled front-end applications. This repository demonstrates a robust Headless CMS approach to design system token distribution.

## 🚀 Key Architectural Features
- **Dynamic Theme Management:** Delivers active design systems (Light, Dark, and Custom themes) via optimized JSON structures, enabling runtime theme transitions on the client side without hardcoded style assets.
- **Persistent Embedded Database:** Utilizes an embedded SQLite architecture, optimized for containerized deployments with seamless schema migrations and automated data seeding.
- **SSL Termination Ready:** Architected to handle secure cloud-based HTTPS reverse-proxies (specifically configured for Railway infrastructure) by enforcing secure URL schemes in production environments to eliminate Mixed Content restrictions.
- **AI-Accelerated Core:** Developed using advanced AI-assisted workflows (Vibe Coding via Cursor) to enforce rapid validation cycles while maintaining enterprise-grade software patterns.

## 🛠️ Tech Stack & Infrastructure
- **Core Framework:** Laravel 13 (PHP 8.3+)
- **Database Engine:** SQLite (Embedded & version-controlled for zero-latency lookups)
- **Deployment Platform:** Railway (Persistent Container with Git-driven CI/CD deployment pipelines)

## 🔗 Project Ecosystem Links
- **Associated Front-end Repository:** https://github.com/tranlongpc325/saas-dashboard-sandbox
- **Figma Design Specification (View-Only):** [Figma Design](https://www.figma.com/design/NV1vGbz8QPH4VNaH6uYS1y/User-Management-Dashboard?node-id=30-3141&t=SmdUjnhahXkjV3vV-1)

## 📋 API Specifications

### Get Active Design Tokens
Retrieves the currently active theme configurations and design variables mapped directly from the Figma UI3 layout structure.

- **HTTP Method:** `GET`
- **Endpoint:** `/api/v1/themes/active`
- **Production Live URL:** `https://design-tokens-api-production.up.railway.app/api/v1/themes/active`
- **Success Response (200 OK):**
   ```json
   {
     "success": true,
     "message": "Active theme tokens retrieved successfully.",
     "data": {
       "theme_name": "light",
       "tokens": {
         "bg_primary": "#ffffff",
         "text_primary": "#1a1a1a",
         "brand_color": "#4f46e5"
       }
     }
   }
   ```

## 💻 Local Setup & Installation

### Prerequisites

* PHP >= 8.3
* Composer

### Step-by-Step Configuration

1. **Clone the repository and navigate to the project root:**
   ```bash
   git clone https://github.com/your-github-username/design-tokens-api.git
   cd design-tokens-api
   ```

2. **Install all production and development dependencies via Composer:**
   ```bash
   composer install
   ```

3. **Configure local environment environment:**
   ```bash
   cp .env.example .env
   ```

4. **Generate the application encryption key:**
   ```bash
   php artisan key:generate
   ```


5. **Initialize the SQLite database file and run seeders to populate initial theme tokens:**
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```


6. **Start the local development server:**
   ```bash
   php artisan serve
   ```

   The local API endpoint will now be active at `http://127.0.0.1:8000/api/v1/themes/active`

## 🔒 Production Environment Variables

When deploying this service to container platforms like Railway, ensure the following core variables are explicitly injected into the dashboard panel to ensure secure, stateless execution:

```env
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
CACHE_STORE=array
SESSION_DRIVER=array
LOG_CHANNEL=stderr
```