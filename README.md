# STREET | Inteligencia Comercial

Sitio web oficial de STREET, una firma especializada en inteligencia comercial e inmobiliaria con enfoque en el desarrollo y operación de plazas comerciales estratégicas en la Zona Metropolitana de Guadalajara (ZMG). Desarrollado con Astro para un rendimiento óptimo, animaciones fluidas y experiencia de usuario premium.

## 🏢 Sobre STREET

STREET es una inmobiliaria comercial líder en Guadalajara que ofrece oportunidades de inversión en plazas comerciales con cap rate del 9-12% anual más plusvalía. La empresa opera bajo cuatro divisiones principales:

- **Street Comercial**: Desarrollo y operación de plazas comerciales
- **Street Operadora**: Gestión integral, mantenimiento y administración
- **Street Living**: Desarrollo residencial y proyectos verticales
- **Padel Street**: Instalaciones y eventos de pádel integrados

## 🚀 Estructura del Proyecto

```text
/
├── public/                 # Activos estáticos (imágenes, fuentes, logos)
│   ├── images/            # Imágenes generales del sitio
│   ├── plazas/            # Imágenes de proyectos por plaza
│   │   ├── Avante Street/
│   │   ├── Nova Street/
│   │   ├── Bosques Street/
│   │   ├── Sendas Street/
│   │   ├── Capital Street/
│   │   ├── Real street/
│   │   ├── Terrazas street/
│   │   └── Universidad Street/
│   └── logo-*.webp        # Logos de la marca
├── src/
│   ├── components/        # Componentes de Astro
│   │   ├── ContactModal.astro    # Modal de contacto
│   │   ├── Footer.astro          # Pie de página
│   │   ├── Hero.astro            # Sección hero con animaciones GSAP
│   │   ├── Info.astro            # Información adicional
│   │   ├── Navbar.astro          # Navegación principal
│   │   ├── Nosotros.astro        # Sección de servicios con modales
│   │   ├── Preloader.astro       # Pantalla de carga inicial
│   │   └── Proyectos.astro       # Showcase de proyectos destacados
│   ├── pages/             # Rutas del sitio
│   │   ├── index.astro           # Página de inicio
│   │   ├── proyectos.astro       # Listado de proyectos
│   │   └── proyectos/
│   │       └── [slug].astro      # Páginas dinámicas de proyecto
│   └── styles/            # Estilos globales CSS
│       └── global.css
├── server/                # Backend PHP para formularios
│   ├── config.php         # Configuración y carga de .env
│   ├── contact.php        # Endpoint de contacto (LeadConnector API)
│   ├── test.php           # Script de prueba PHP
│   └── test-contact.html  # Formulario de prueba
├── .roo/commands/         # Comandos personalizados de Roo
│   ├── openspec-apply.md
│   ├── openspec-archive.md
│   └── openspec-proposal.md
├── astro.config.mjs       # Configuración de Astro
├── package.json           # Dependencias y scripts
├── tsconfig.json          # Configuración TypeScript
└── .htaccess             # Configuración Apache para deploy
```

## 🛠️ Tecnologías Principales

| Tecnología       | Versión  | Propósito                                           |
| ---------------- | -------- | --------------------------------------------------- |
| **Astro**        | ^5.16.15 | Framework web para contenido rápido y estático      |
| **GSAP**         | ^3.14.2  | Animaciones de alto rendimiento y control de scroll |
| **Tailwind CSS** | ^4.1.18  | Framework CSS utilitario moderno                    |
| **Anime.js**     | ^4.3.5   | Animaciones adicionales                             |
| **TypeScript**   | -        | Tipado estático para JavaScript                     |
| **PHP**          | 7.4+     | Backend para formularios de contacto                |

## 🧞 Comandos

Todos los comandos se ejecutan desde la raíz del proyecto:

| Comando           | Acción                                               |
| ----------------- | ---------------------------------------------------- |
| `npm install`     | Instala las dependencias del proyecto                |
| `npm run dev`     | Inicia el servidor de desarrollo en `localhost:4321` |
| `npm run build`   | Construye el sitio para producción en `./dist/`      |
| `npm run preview` | Previsualiza la construcción localmente              |

## 📁 Proyectos Comerciales

El sitio presenta **11 proyectos comerciales** en diferentes etapas:

### En Preventa

- **Avante Street** (Capital Norte, Zapopan) - 51 locales, ROI 9-11%
- **Nova Street** (Zona Norte ZMG) - 42 locales, ROI ~10%
- **Albaterra Street** (Zapopan) - En desarrollo

### En Construcción

- **Bosques Street** (Capital Norte) - 32 locales + 16 unidades médicas
- **Elarc Street** (Zona Poniente) - 20 locales, entrega 2028

### Operando

- **Capital Street** (Capital Norte) - 100% vendida y rentada
- **Las Terrazas Street** (Tlaquepaque) - 19 locales
- **Sendas Street** (Tlajomulco) - ~35 locales
- **Real Street** (Zapopan Norte) - 11 locales
- **Street Universitaria** (Tlaquepaque, ITESO) - 100% vendida y rentada

### En Planeación

- **Zimaltá Street** - Próximamente

## 🎨 Identidad Visual

El proyecto sigue estrictamente el manual de identidad de STREET:

### Colores

| Nombre            | Código                | Uso                                 |
| ----------------- | --------------------- | ----------------------------------- |
| **Navy Dark**     | `#15152A` / `#14142C` | Fondos oscuros, textos principales  |
| **Cream**         | `#F7EFE6` / `#F0E6DB` | Fondos claros                       |
| **Yellow Accent** | `#FCC419`             | Acentos, CTAs, elementos destacados |

### Tipografía

- **Monument Extended** (Títulos, headings, branding)
- **Neue Montreal** (Cuerpo, texto general, UI)

## 🔧 Backend y API

### Integración LeadConnector

El formulario de contacto se integra con **LeadConnector API** para gestión de leads:

- **Endpoint**: `POST /server/contact.php`
- **Campos**: `leadName`, `email`, `phone`, `businessName`
- **Configuración**: Variables de entorno en `.env`
  ```
  LEADCONNECTOR_API_KEY=your_api_key
  LEADCONNECTOR_LOCATION_ID=your_location_id
  ```

### Configuración Apache (.htaccess)

- Protección de archivos sensibles (`.env`)
- Redirección a HTTPS (opcional)
- Manejo de rutas dinámicas para Astro static output
- Compresión gzip y caché de assets

## 📱 Características del Sitio

### Animaciones y UX

- **Preloader** con animación de logo
- **Hero animado** con rotación de palabras (GSAP)
- **Scroll animations** con Intersection Observer
- **Modal de servicios** con hover/click interactivo
- **Carruseles de imágenes** en páginas de proyecto
- **Transiciones suaves** entre secciones

### Páginas Principales

1. **Home** (`/`) - Hero animado, servicios, proyectos destacados
2. **Proyectos** (`/proyectos`) - Listado interactivo con filtros
3. **Detalle de Proyecto** (`/proyectos/[slug]`) - Página dinámica por plaza

### Responsive Design

- Mobile-first approach
- Breakpoints: 768px, 1024px, 1200px+
- Menú hamburguesa en móvil
- Modales adaptados para touch

## 🌐 SEO y Meta Tags

El sitio incluye meta tags completos:

- Open Graph / Facebook
- Twitter Cards
- Schema.org (LocalBusiness / RealEstateAgent)
- Geo tags para Guadalajara, Jalisco
- Canonical URLs
- Theme colors

## 🔒 Seguridad

- Variables de entorno protegidas (`.env` en `.gitignore`)
- CORS habilitado para API requests
- Validación de inputs en formularios
- Protección de archivos sensibles vía `.htaccess`

## 📋 Metodología OpenSpec

Este proyecto utiliza **OpenSpec** para la gestión de cambios y especificaciones:

- `.roo/commands/openspec-apply.md` - Aplicar cambios aprobados
- `.roo/commands/openspec-archive.md` - Archivar cambios desplegados
- `.roo/commands/openspec-proposal.md` - Crear nuevas propuestas

## 🚀 Deploy

### Requisitos del Servidor

- PHP 7.4 o superior
- Soporte para `.htaccess` (Apache)
- Extensión cURL habilitada

### Pasos de Deploy

1. Ejecutar `npm run build`
2. Subir contenido de `./dist/` al servidor
3. Subir carpeta `server/` al servidor
4. Configurar variables de entorno en `.env`
5. Verificar permisos de archivos PHP

---

## 👨‍💻 Desarrollo

Este sitio web fue desarrollado por **Third Studio**.

- **Sitio Web**: https://thirdstudio.tech
- **Email**: hola@thirdstudio.tech
- **Teléfonos**: +52 3310918154, +52 3338153789

## � Contacto STREET

- **Sitio Web**: https://streetmx.com
- **Email**: hola@streetmx.com
- **Teléfono**: +52 332 581 3250

---

© 2026 STREET Inteligencia Comercial. Todos los derechos reservados.
