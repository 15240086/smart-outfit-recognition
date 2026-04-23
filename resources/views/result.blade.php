<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitScan - Smart Outfit Recognition</title>
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
                    <span style="color:#73A5CA;">FitScan</span>
                    <!--end::Brand Primary-->
                    <!--begin::Brand Secondary-->
                    <span style="color:#E87F24;">AI</span>
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
                <span>Unggah Lagi</span>
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
                <!--begin::Outfit Result Card-->
                <div class="panel-card p-6">
                    <!--begin::Section Header-->
                    <div class="mb-4">
                        <h2 class="text-xl font-elegant font-semibold mb-2" style="color:#E87F24;">
                            Hasil Identifikasi Outfit
                        </h2>
                        <div class="theme-divider"></div>
                    </div>
                    <!--end::Section Header-->
                    <!--begin::Outfit List-->
                    <div class="space-y-4">
                        @foreach ($outfits as $index => $item)
                            <!--begin::Outfit Item-->
                            <div class="palette-chip flex items-center justify-between p-4">
                                <!--begin::Outfit Info-->
                                <div>
                                    <p class="font-semibold text-gray-800">
                                        {{ $item['type'] }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Outfit {{ $index + 1 }}
                                    </p>
                                </div>
                                <!--end::Outfit Info-->
                                <!--begin::Percentage-->
                                <div class="text-right">
                                    <p class="text-lg font-semibold" style="color:#E87F24;">
                                        {{ $item['percentage'] }}%
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        Dominasi
                                    </p>
                                </div>
                                <!--end::Percentage-->
                            </div>
                            <!--end::Outfit Item-->
                        @endforeach
                    </div>
                    <!--end::Outfit List-->
                </div>
                <!--end::Outfit Result Card-->
                @if (!empty($summary))
                    <!--begin::Summary Card-->
                    <div class="panel-card p-6">
                        <div class="mb-4">
                            <h2 class="text-xl font-elegant font-semibold mb-2" style="color:#E87F24;">
                                Ringkasan Analisis
                            </h2>
                            <div class="theme-divider"></div>
                        </div>

                        <div class="yellow-box p-4">
                            <p class="text-sm text-gray-700">
                                {{ $summary }}
                            </p>
                        </div>
                    </div>
                    <!--end::Summary Card-->
                @endif
            </div>
            <!--end::Right Column-->
        </div>
        <!--end::Grid-->
    </main>
    <!--end::Main-->
</body>
</html>
