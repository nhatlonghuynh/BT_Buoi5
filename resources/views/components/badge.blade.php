@php
$age = (int)($age ?? 0);
$isAdult = $age >= 18;
@endphp
<span style="padding:2px 8px; border-radius:10px; font-size:12px;
background: <?php echo $isAdult ? '#DCFCE7' : '#fee2e2' ?>;
color:  <?php echo $isAdult ? '#00e24fff' : '#ad6565ff' ?>;">
    {{ $isAdult ? 'Adult (≥18)' : 'Under 18' }}
</span>