@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
 <label class="fs-4 fw-bold">PRESCRIBING SYSTEM</label>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
