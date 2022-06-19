@component('mail::message')
Salut,

Un utilisateur s'est interesse a ton offre.

Il s'agit de: {{Auth::user()->name}},
Repond lui par mail a  {{Auth::user()->email}}.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
