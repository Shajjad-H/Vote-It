@if ( session($name) )
@component('components.alert', [
                                'type' => $type,
                                'text' => $text
                              ])
@endcomponent
@endif
