<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Person",
        "telephone": "{{ array_get($fields, 'telephone.content') }}",
        "name": "{{ array_get($fields, 'name.content') }}",
        "jobTitle": "{{ array_get($fields, 'jobTitle.content') }}",
        "url": "{{ array_get($fields, 'url.content') }}",
        "sameAs": @json(array_get($fields, 'sameAs.content')),
        "email": "{{ array_get($fields, 'email.content') }}",
        "birthDate": "{{ array_get($fields, 'birthDate.content') }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ array_get($fields, 'streetAddress.content') }}",
            "addressLocality": "{{ array_get($fields, 'addressLocality.content') }}",
            "addressRegion": "{{ array_get($fields, 'addressRegion.content') }}",
            "postalCode": "{{ array_get($fields, 'postalCode.content') }}",
            "addressCountry": "{{ array_get($fields, 'addressCountry.content') }}"
        }
    }
</script>
