<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "{{ array_get($fields, 'name.content') }}",
        "url": "{{ array_get($fields, 'url.content') }}",
        "sameAs": @json(array_get($fields, 'sameAs.content')),
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ array_get($fields, 'streetAddress.content') }}",
            "addressLocality": "{{ array_get($fields, 'addressLocality.content') }}",
            "addressRegion": "{{ array_get($fields, 'addressRegion.content') }}",
            "postalCode": "{{ array_get($fields, 'postalCode.content') }}",
            "addressCountry": "{{ array_get($fields, 'addressCountry.content') }}"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "{{ array_get($fields, 'contactType.content') }}",
            "telephone": "{{ array_get($fields, 'telephone.content') }}",
            "email": "{{ array_get($fields, 'email.content') }}"
        }
    }
</script>
