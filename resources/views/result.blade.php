<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisis Outfit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Crimson+Text:wght@400;600;700&family=EB+Garamond:wght@400;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        .font-title {
            font-family: "Bungee", sans-serif;
        }

        .font-body {
            font-family: "Inter", sans-serif;
        }

        .font-accent {
            font-family: "Crimson Text", serif;
        }

        .font-elegant {
            font-family: "EB Garamond", serif;
        }

        .panel-card {
            background: rgba(255,255,255,0.92);
            border: 1px solid #FFC81E;
            border-radius: 24px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.05);
        }

        .soft-box {
            background-color: #FFFDF4;
            border: 1px solid #F3D66B;
            border-radius: 18px;
        }

        .blue-box {
            background-color: #EEF6FC;
            border: 1px solid #73A5CA;
            border-radius: 18px;
        }

        .yellow-box {
            background-color: #FFF7CC;
            border: 1px solid #FFC81E;
            border-radius: 18px;
        }

        .theme-link {
            color: #73A5CA;
            transition: color 0.3s ease;
        }

        .theme-link:hover {
            color: #E87F24;
        }

        .theme-divider {
            height: 4px;
            width: 80px;
            border-radius: 9999px;
            background: linear-gradient(to right, #E87F24, #FFC81E, #73A5CA);
        }

        .image-frame {
            border: 1px solid #F3D66B;
            border-radius: 18px;
            background-color: #FFFDF4;
        }

        .palette-chip {
            background-color: #FFFDF4;
            border: 1px solid #F3D66B;
            border-radius: 18px;
        }

        .mini-card {
            background-color: #FFFDF4;
            border: 1px solid #F3D66B;
            border-radius: 18px;
        }
    </style>
</head>

<body class="min-h-screen text-gray-800 font-body" style="background-color:#FEFDDF;">
    <!--begin::Header-->
    <header class="sticky top-0 z-50 backdrop-blur border-b" style="background-color:rgba(254,253,223,0.92); border-color:#FFC81E;">
        <!--begin::Container-->
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <!--begin::Brand-->
            <div>
                <!--begin::Brand Title-->
                <h1 class="text-lg font-title tracking-wide">
                    <!--begin::Brand Primary-->
                    <span style="color:#73A5CA;">Color</span>
                    <!--end::Brand Primary-->
                    <!--begin::Brand Secondary-->
                    <span style="color:#E87F24;">Outfit</span>
                    <!--end::Brand Secondary-->
                </h1>
                <!--end::Brand Title-->
            </div>
            <!--end::Brand-->
            <!--begin::Back Link-->
            <a href="{{ route('upload') }}" class="text-sm font-elegant theme-link inline-flex items-center gap-2">
                <!--begin::Back Link Icon-->
                <span>←</span>
                <!--end::Back Link Icon-->
                <!--begin::Back Link Text-->
                <span>Upload Lagi</span>
                <!--end::Back Link Text-->
            </a>
            <!--end::Back Link-->
        </div>
        <!--end::Container-->
    </header>
    <!--end::Header-->
    <!--begin::Main-->
    <main class="max-w-6xl mx-auto px-6 py-10">
        <!--begin::Grid-->
        <div class="grid lg:grid-cols-2 gap-8">
            <!--begin::Left Column-->
            <div class="space-y-6">
                <!--begin::Original Image Card-->
                <div class="panel-card p-6">
                    <!--begin::Section Header-->
                    <div class="mb-4">
                        <h2 class="text-xl font-elegant font-semibold mb-2" style="color:#E87F24;">
                            Gambar Asli
                        </h2>
                        <div class="theme-divider"></div>
                    </div>
                    <!--end::Section Header-->
                    <!--begin::Image Wrapper-->
                    <div class="image-frame p-2">
                        <img src="{{ asset('storage/' . $imagePath) }}" alt="Uploaded Outfit" class="w-full rounded-2xl">
                    </div>
                    <!--end::Image Wrapper-->
                </div>
                <!--end::Original Image Card-->
                @if (!empty($cropPreview))
                    <!--begin::Crop Image Card-->
                    <div class="panel-card p-6">
                        <!--begin::Section Header-->
                        <div class="mb-4">
                            <h2 class="text-xl font-elegant font-semibold mb-2" style="color:#E87F24;">
                                Area Crop yang Dianalisis
                            </h2>
                            <div class="theme-divider"></div>
                        </div>
                        <!--end::Section Header-->
                        <!--begin::Image Wrapper-->
                        <div class="image-frame p-2">
                            <img src="{{ asset('storage/' . $cropPreview) }}" alt="Cropped Outfit" class="w-full rounded-2xl">
                        </div>
                        <!--end::Image Wrapper-->
                    </div>
                    <!--end::Crop Image Card-->
                @endif
            </div>
            <!--end::Left Column-->
            <!--begin::Right Column-->
            <div class="space-y-6">
                <!--begin::Palette Card-->
                <div class="panel-card p-6">
                    <!--begin::Section Header-->
                    <div class="mb-4">
                        <h2 class="text-xl font-elegant font-semibold mb-2" style="color:#E87F24;">
                            Top 5 Palette Warna
                        </h2>
                        <div class="theme-divider"></div>
                    </div>
                    <!--end::Section Header-->
                    <!--begin::Palette List-->
                    <div class="space-y-4">
                        @foreach ($palette as $index => $color)
                            <!--begin::Palette Item-->
                            <div class="palette-chip flex items-center gap-4 p-3">
                                <!--begin::Color Swatch-->
                                <div class="w-16 h-16 rounded-xl border" style="background-color: {{ $color['hex'] }}; border-color:#d6d3d1;"></div>
                                <!--end::Color Swatch-->
                                <!--begin::Color Info-->
                                <div class="text-sm text-gray-700">
                                    <p class="font-semibold">Warna {{ $index + 1 }} - {{ $color['label'] }}</p>
                                    <p>HEX: {{ $color['hex'] }}</p>
                                    <p>Dominasi: {{ $color['percentage'] }}%</p>
                                </div>
                                <!--end::Color Info-->
                            </div>
                            <!--end::Palette Item-->
                        @endforeach
                    </div>
                    <!--end::Palette List-->
                </div>
                <!--end::Palette Card-->
                <!--begin::Top Colors Card-->
                <div class="panel-card p-6">
                    <!--begin::Section Header-->
                    <div class="mb-4">
                        <h2 class="text-xl font-elegant font-semibold mb-2" style="color:#E87F24;">
                            Top 3 Warna Utama
                        </h2>
                        <div class="theme-divider"></div>
                    </div>
                    <!--end::Section Header-->
                    <!--begin::Top Color Grid-->
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($topColors as $color)
                            <!--begin::Top Color Item-->
                            <div class="mini-card p-4 text-center">
                                <!--begin::Color Preview-->
                                <div class="w-full h-16 rounded-xl border mb-3" style="background-color: {{ $color['hex'] }}; border-color:#d6d3d1;"
                                ></div>
                                <!--end::Color Preview-->
                                <!--begin::Color Hex-->
                                <p class="text-xs font-medium">{{ $color['hex'] }}</p>
                                <!--end::Color Hex-->
                                <!--begin::Color Label-->
                                <p class="text-xs text-gray-500 mt-1">{{ $color['label'] }}</p>
                                <!--end::Color Label-->
                            </div>
                            <!--end::Top Color Item-->
                        @endforeach
                    </div>
                    <!--end::Top Color Grid-->
                </div>
                <!--end::Top Colors Card-->
                <!--begin::Recommendation Card-->
                <div class="panel-card p-6">
                    <!--begin::Section Header-->
                    <div class="mb-4">
                        <h2 class="text-xl font-elegant font-semibold mb-2" style="color:#E87F24;">
                            Rekomendasi Kombinasi
                        </h2>
                        <div class="theme-divider"></div>
                    </div>
                    <!--end::Section Header-->
                    <!--begin::Recommendation Details-->
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><span class="font-medium">Warna utama:</span> {{ $recommendation['main'] ?? '-' }}</p>
                        <p><span class="font-medium">Warna pendamping:</span> {{ $recommendation['secondary'] ?? '-' }}</p>
                        <p><span class="font-medium">Warna aksen:</span> {{ $recommendation['accent'] ?? '-' }}</p>
                        <p><span class="font-medium">Saran bawahan:</span> {{ $recommendation['bottom'] ?? '-' }}</p>
                        <p><span class="font-medium">Saran sepatu:</span> {{ $recommendation['shoes'] ?? '-' }}</p>
                        <p><span class="font-medium">Saran aksesoris:</span> {{ $recommendation['accessory'] ?? '-' }}</p>
                    </div>
                    <!--end::Recommendation Details-->
                    <!--begin::Description Box-->
                    <div class="mt-5 blue-box p-4">
                        <p class="text-sm text-gray-700">
                            {{ $recommendation['description'] ?? '-' }}
                        </p>
                    </div>
                    <!--end::Description Box-->
                    @if (!empty($summary))
                        <!--begin::Summary Box-->
                        <div class="mt-4 yellow-box p-4">
                            <p class="text-sm text-gray-700">
                                <span class="font-medium">Ringkasan:</span> {{ $summary }}
                            </p>
                        </div>
                        <!--end::Summary Box-->
                    @endif
                </div>
                <!--end::Recommendation Card-->
            </div>
            <!--end::Right Column-->
        </div>
        <!--end::Grid-->
    </main>
    <!--end::Main-->
</body>
</html>