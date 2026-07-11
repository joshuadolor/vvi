@php
    $company = config('company');
    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $company['name'],
        'legalName' => $company['legal_name'],
        'alternateName' => $company['short_name'],
        'url' => url('/'),
        'slogan' => $company['tagline'],
        'description' => $company['description'],
        'foundingDate' => $company['founded'],
        'parentOrganization' => [
            '@type' => 'Organization',
            'name' => $company['parent_group'],
        ],
        'email' => $company['contact']['email'] ?? null,
        'areaServed' => $company['contact']['locations'] ?? [],
        'knowsAbout' => $company['services'],
        'makesOffer' => array_map(fn ($service) => [
            '@type' => 'Offer',
            'itemOffered' => ['@type' => 'Service', 'name' => $service],
        ], $company['services']),
    ];

    if (! empty($company['social'])) {
        $organizationSchema['sameAs'] = array_values($company['social']);
    }
@endphp
<script type="application/ld+json">
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
