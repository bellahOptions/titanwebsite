@component('mail::message')
# Property {{ ucfirst($action) }}

A property has been **{{ $action }}** by {{ $property->user->name ?? 'an admin' }}.

**Title:** {{ $property->title }}  
**Type:** {{ ucfirst($property->type) }}  
**Price:** ${{ number_format($property->price, 2) }}  
**Location:** {{ $property->location }}

@if($property->images)
![Property Image]({{ $property->images[0] }})
@endif

@component('mail::button', ['url' => route('properties.show', $property->id)])
View Property
@endcomponent

Thanks,  
**Titan System**
@endcomponent
