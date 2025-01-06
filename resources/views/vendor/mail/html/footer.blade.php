<tr>
<td>
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">
    <div style="margin-top: 20px; font-size: 12px; color: #000;">
        <p style="margin: 0;"> {{ $contactUs ? ($contactUs->company_name) : '' }} </p>
        <p style="margin: 0;"> {{ $contactUs ? ($contactUs->first_address) : '' }}</p>
        <p style="margin: 0;">Email: 
            <a href="{{ $contactUs ? ($contactUs->first_email) : '' }}" style="color: #000052;">
            {{ $contactUs ? ($contactUs->first_email) : '' }}</a>
        </p>
        <p style="margin: 0;">Phone: {{ $contactUs ? ($contactUs->first_phone) : '' }} | {{ $contactUs ? ($contactUs->second_phone) : '' }}  </p>
        <p style="margin: 0;">Website: <a href="{{ $contactUs ? ($contactUs->website_link) : '' }}" style="color: #000052;">{{ $contactUs ? ($contactUs->website_link) : '' }}</a></p>
    </div>
    <br>
    {{ Illuminate\Mail\Markdown::parse($slot) }}
</td>
</tr>
</table>
</td>
</tr>
