<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance System</title>

    @env('production')
    @php $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true); @endphp
    <link rel="stylesheet" href="{{ asset("build/{$manifest['resources/ts/main.tsx']['css'][0]}") }}">
    @endenv
</head>

<body>
    <div id="root"></div>

    @env('local')
    @viteReactRefresh
    @vite('resources/ts/main.tsx')
    @endenv

    @env('production')
    <script type="module" src="{{ asset("build/{$manifest['resources/ts/main.tsx']['file']}") }}"></script>
    @endenv
</body>

</html>
