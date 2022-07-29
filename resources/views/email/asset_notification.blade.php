@component('mail::message')
# {{$info["title"]}}
<ul>
  @isset($info["id"])
  <li>ID: {{$info["id"]}}</li>
  @endisset
  <li>Asset name: {{$info["name"]}}</li>
  <li>Asset category: {{$info["category"]}}</li>
  <li>Assigned to: {{$info["user"]}}</li>
</ul>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
