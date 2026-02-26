<!doctype html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIPENJALU</title>
  <script>
    (function() {
      const savedTheme = localStorage.getItem('sipenjalu-theme');
      document.documentElement.setAttribute('data-theme', savedTheme ? savedTheme : 'dark');
    })();
  </script>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            // Modern Gen Z color palette
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              200: '#bae6fd',
              300: '#7dd3fc',
              400: '#38bdf8',
              500: '#0ea5e9',
              600: '#0284c7',
              700: '#0369a1',
              800: '#075985',
              900: '#0c4a6e',
              950: '#082f49',
            },
            secondary: {
              50: '#fdf4ff',
              100: '#fae8ff',
              200: '#f5d0fe',
              300: '#f0abfc',
              400: '#e879f9',
              500: '#d946ef',
              600: '#c026d3',
              700: '#a21caf',
              800: '#86198f',
              900: '#701a75',
              950: '#4a044e',
            },
            accent: {
              50: '#fff7ed',
              100: '#ffedd5',
              200: '#fed7aa',
              300: '#fdba74',
              400: '#fb923c',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
              800: '#9a3412',
              900: '#7c2d12',
              950: '#431407',
            },
            // Dark theme colors - more modern and vibrant
            dark: {
              50: '#fafafa',
              100: '#f4f4f5',
              200: '#e4e4e7',
              300: '#d4d4d8',
              400: '#a1a1aa',
              500: '#71717a',
              600: '#52525b',
              700: '#3f3f46',
              800: '#27272a',
              900: '#18181b',
              950: '#09090b',
            },
            // Background gradients
            bg: {
              primary: '#0a0a0a',
              secondary: '#111111',
              tertiary: '#1a1a1a',
              accent: '#2a2a2a',
            },
            // Text colors
            text: {
              primary: '#ffffff',
              secondary: '#f5f5f5',
              tertiary: '#d4d4d8',
              muted: '#a1a1aa',
            }
          },
          fontFamily: {
            'sans': ['Inter', 'system-ui', 'sans-serif'],
            'display': ['Sora', 'system-ui', 'sans-serif'],
            'mono': ['JetBrains Mono', 'monospace'],
          },
          animation: {
            'fade-in': 'fadeIn 0.5s ease-in-out',
            'slide-up': 'slideUp 0.3s ease-out',
            'bounce-subtle': 'bounceSubtle 2s infinite',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            slideUp: {
              '0%': { transform: 'translateY(10px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' },
            },
            bounceSubtle: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-5px)' },
            },
          },
          boxShadow: {
            'glow': '0 0 20px rgba(14, 165, 233, 0.3)',
            'glow-purple': '0 0 20px rgba(217, 70, 239, 0.3)',
            'glow-orange': '0 0 20px rgba(249, 115, 22, 0.3)',
          }
        }
      }
    }
  </script>

  <!-- my css -->
  <link rel="stylesheet" href="assets/css/style1.css">
  <link rel="stylesheet" href="assets/css/label.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- sweet alert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <!-- Include DataTables CSS and JS -->
  <link href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>

  <!-- Include DataTables Buttons CSS and JS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

</head>

<body class="bg-gradient-to-br from-bg-primary via-bg-secondary to-bg-tertiary min-h-screen font-sans antialiased text-text-primary">