@component('mail::message')
Salut {{ $offre_click->user->name }},

Rentre sur Immob' et decouvre l'offre qui t'interesse:
    <a href="{{route('compatibles', $offre_click->offre->id)}}" class="btn btn-primary">Voir l'offre</a>

    
Thanks,<br>
{{ config('app.name') }}
@endcomponent