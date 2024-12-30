<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>
<style>
    /* table {
        max-width: 3608;
        width: 100%;
    } */
    table {
        max-width: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
        font-size: 8px;
        /* Sesuaikan ukuran font sesuai kebutuhan Anda */
    }

    @page {
        margin: 10px;
    }

    body {
        margin: 10px;
    }

    table td {
        width: auto;
        overflow: hidden;
        word-wrap: break-word;
    }
</style>
<table style="border-collapse: collapse; border: none; border-spacing: 0px;">
    <tr>
        <td rowspan="3" colspan="3"
            style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
            <div style="text-align: center;">
                <img src="assets/img/avatar/tch.png" height="50px" width="120px" alt="">
            </div>
        </td>
        <td rowspan="3" colspan="21"
            style="border-width: 1px; border-style: solid; font-size:15px; border-color: rgb(0, 0, 0); text-align: center; padding-right: 3pt; padding-left: 3pt;">
            <b>DAILY CHECK POINT MESIN</b>
            <br>
            <b></b>
            @foreach ($data1 as $a)
                {{ $a->name_mesin }} {{ $a->type }}
            @break
        @endforeach
    </td>
    <td colspan="6"
        style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); text-align: center; padding-right: 3pt; padding-left: 3pt;">
        DICEK
    </td>
    <td colspan="6"
        style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); text-align: center; padding-right: 3pt; padding-left: 3pt;">
        DIBUAT
    </td>
</tr>
<tr>
    <td colspan="6"
        style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
        <br>
        <br>
    </td>
    <td colspan="6"
        style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
    </td>
</tr>
<tr>
    <td colspan="6"
        style="border-width: 1px; border-style: solid; font-size:9px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
        Nama :
    </td>
    <td colspan="6"
        style="border-width: 1px; border-style: solid; font-size:9px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
        Nama :
        @foreach ($get_pic as $c)
            @if ($c->shift === 'A')
                <span style="font-size: 7px;">{{ $c->name }}</span>
            @break
        @endif
    @endforeach
    /
    @foreach ($get_pic as $c)
        @if ($c->shift === 'B')
            <span style="font-size: 7px;">{{ $c->name }}</span>
        @break
    @endif
@endforeach

</td>
</tr>
<tr>
<td rowspan="2"
style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
NO
</td>
<td rowspan="2" colspan="2"
style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; background:rgb(205, 224, 159);">
OPERATOR CEK POINT MESIN
</td>

<td rowspan="2"
style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); text-align: center; padding-right: 3pt; padding-left: 3pt; text-align:center; background:rgb(205, 224, 159);">
STANDART
</td>
<td rowspan="2"
style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
SHIFT
</td>
<td colspan="31"
style="border-width: 1px; border-style: solid; font-size:10px; border-color: rgb(0, 0, 0); text-align: center; padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
BULAN : {{ $month }}
</td>
</tr>
<tr>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;  background:rgb(205, 224, 159);">
1
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
2
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
3
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
4
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
5
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
6
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
7
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
8
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
9
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
10
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
11
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
12
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
13
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
14
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
15
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
16
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;  background:rgb(205, 224, 159);">
17
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
18
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
19
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
20
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
21
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
22
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
23
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
24
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
25
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
26
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
27
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
28
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
29
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
30
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; background:rgb(205, 224, 159);">
31
</td>
</tr>
@php
    $groupedData = $pointsheet->groupBy('kategori');
@endphp

@foreach ($groupedData as $kategori => $items)
@php
    $rowSpan = count($items) * 2;
@endphp

<tr>
<td class="text-center" rowspan="{{ $rowSpan }}"
    style="border-width: 1px; border-style: solid; font-size: 10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
    {{ $loop->iteration }}
</td>

<td class="text-center" rowspan="{{ $rowSpan }}" colspan="2"
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;  word-wrap: break-word; width:155px;">
    {{ $kategori }}
</td>
@foreach ($items as $index => $item)
    @php
        $filteredData = $data1->where('id_point', $item->id_point)->sortBy('id_point');
    @endphp
    @php
        $alphabets = range('a', 'z'); // Membuat array abjad dari A hingga Z
    @endphp
    <td rowspan="2"
        style="border-width: 1px; border-style: solid;   font-size:11px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;  word-wrap: break-word; width:250px;">
        {{ $alphabets[$loop->index] }}. {{ $item->standard }}
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        A
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '01' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                        height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '02' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                        height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '03' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '04' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '05' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '06' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '07' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '08' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '09' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '10' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '11' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '12' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '13' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '14' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '15' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '16' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '17' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '18' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '19' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '20' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '21' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '22' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '23' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '24' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '25' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '26' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '27' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '28' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '29' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '30' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
    <td
        style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
        <!-- Access the corresponding data from $data1 based on the condition -->
        @foreach ($filteredData as $data)
            @if ($data->date == '31' && $data->shift == 'A')
                @if ($data->answer == 'O')
                    <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'T')
                    <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'A')
                    <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                        width="8px" height="8px">
                @elseif ($data->answer == 'R')
                    <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                        width="8px" height="8px">
                @endif
            @endif
        @endforeach
    </td>
</tr>
<tr>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    B
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '01' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '02' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '03' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '04' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '05' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '06' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '07' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '08' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '09' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '10' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '11' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '12' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '13' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '14' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '15' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '16' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '17' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '18' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center; ">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '19' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '20' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '21' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '22' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '23' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon" width="8px"
                    height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '24' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '25' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '26' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '27' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '28' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '29' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '30' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
<td
    style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
    <!-- Access the corresponding data from $data1 based on the condition -->
    @foreach ($filteredData as $data)
        @if ($data->date == '31' && $data->shift == 'B')
            @if ($data->answer == 'O')
                <img src="{{ public_path('assets/img/avatar/rec.png') }}" alt="OK Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'T')
                <img src="{{ public_path('assets/img/avatar/minus.png') }}" alt="Tidak Ada Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'A')
                <img src="{{ public_path('assets/img/avatar/triangle.png') }}" alt="Abnormal Icon"
                    width="8px" height="8px">
            @elseif ($data->answer == 'R')
                <img src="{{ public_path('assets/img/avatar/close.png') }}" alt="Rusak Icon"
                    width="8px" height="8px">
            @endif
        @endif
    @endforeach
</td>
</tr>
@endforeach
@endforeach

<tr>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); background-color: rgb(205, 224, 159); padding-right: 3pt; padding-left: 3pt;">

</td>
<td colspan="2"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); background-color: rgb(205, 224, 159); text-align: center; padding-right: 3pt; padding-left: 3pt;">
PIC MESIN
</td>
<td rowspan="2"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); background-color: rgb(205, 224, 159); text-align: center; padding-right: 3pt; padding-left: 3pt;">
KODE PENGISIAN
</td>
<td rowspan="2" colspan="32"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); background-color: rgb(205, 224, 159); text-align: center; padding-right: 3pt; padding-left: 3pt;">
ILUSTRASI CEK POINT
</td>
</tr>
<tr>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); background-color: rgb(205, 224, 159); padding-right: 3pt; padding-left: 3pt;">
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); background-color: rgb(205, 224, 159); text-align: center; padding-right: 3pt; padding-left: 3pt;">
SHIFT A
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); background-color: rgb(205, 224, 159); text-align: center; padding-right: 3pt; padding-left: 3pt;">
SHIFT B
</td>
</tr>
<tr>
<td rowspan="5"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">

</td>
<td rowspan="5"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">

</td>
<td rowspan="5"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">

</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">

</td>
<td rowspan="6" colspan="8"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">

@foreach ($image as $item)
    @if ($item->type_img == '1')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">1</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="90px" width="140px" style="display: block;">

        </div>
    @endif
@endforeach


</td>
<td rowspan="3" colspan="4"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
{{-- 2A --}}
@foreach ($image as $item)
    @if ($item->type_img == '2A')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">2A</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px" style="display: block;">

        </div>
    @endif
@endforeach
</td>
<td rowspan="3" colspan="4"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
{{-- 3A --}}
@foreach ($image as $item)
    @if ($item->type_img == '3A')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">3A</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px" style="display: block;">

        </div>
    @endif
@endforeach
</td>
<td rowspan="3" colspan="4"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
{{-- 3C --}}
<!-- Report-daily-check.report_pdf.blade.php -->
@foreach ($image as $item)
    @if ($item->type_img == '3C')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">3C</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px" style="display: block;">

        </div>
    @endif
@endforeach
</td>
<td rowspan="3" colspan="4"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
{{-- 4B,6,5,5A --}}
{{-- @php
        $isConditionMet = false;
    @endphp

    @foreach ($image as $item)
        @if ($item->type_img == '4B')
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image" height="40px"
                width="60px">
            @php
                $isConditionMet = true;
            @endphp
        @break
    @endif
    @endforeach

    @if (!$isConditionMet)
    @foreach ($image as $item)
        @if ($item->type_img == '6')
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px">
            @php
                $isConditionMet = true;
            @endphp
        @break
    @endif
    @endforeach
    @endif

    @if (!$isConditionMet)
    @foreach ($image as $item)
    @if ($item->type_img == '5')
        <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
            height="40px" width="60px">
        @php
            $isConditionMet = true;
        @endphp
    @break
    @endif
    @endforeach
    @endif --}}
{{-- 4B --}}
@foreach ($image as $item)
    @if ($item->type_img == '4B')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">4B</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px" style="display: block;">

        </div>
    @endif
@endforeach
</td>
<td rowspan="6" colspan="8"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
{{-- 6A,6,8 --}}
{{-- @php
        $isConditionMet = false;
    @endphp

    @foreach ($image as $item)
    @if ($item->type_img == '6A')
    <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image" height="90px"
    width="130px">
    @php
        $isConditionMet = true;
    @endphp
    @break
    @endif
    @endforeach

    @if (!$isConditionMet)
    @foreach ($image as $item)
    @if ($item->type_img == '6')
    <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
    height="90px" width="140px">
    @php
        $isConditionMet = true;
    @endphp
    @break
    @endif
    @endforeach
    @endif

    @if (!$isConditionMet)
    @foreach ($image as $item)
    @if ($item->type_img == '8')
    <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
    height="90px" width="140px">
    @php
        $isConditionMet = true;
    @endphp --}}
{{-- 6 --}}
@foreach ($image as $item)
    @if ($item->type_img == '6')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">6</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="90px" width="140px" style="display: block;">

        </div>
    @endif
@endforeach
{{-- @break --}}

{{--
    @endif
    @endforeach
    @endif --}}
</td>
</tr>
<tr>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
<img src="{{ public_path('assets\img\avatar\close.png') }}" width=8px" height="8px"
    alt="">
= Rusak
</td>
</tr>
<tr>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
<img src="{{ public_path('assets\img\avatar\triangle.png') }}" width=10px" height="10px"
    alt="">
= Abnormal
</td>
</tr>
<tr>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
<img src="{{ public_path('assets\img\avatar\rec.png') }}" width=10px" height="10px" alt="">
= OK
</td>
<td rowspan="3" colspan="4"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
{{-- 2b --}}
@foreach ($image as $item)
    @if ($item->type_img == '2B')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">2B</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px" style="display: block;">

        </div>
    @endif
@endforeach
</td>

<td rowspan="3" colspan="4"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align: center;">
{{-- 3B --}}
@foreach ($image as $item)
    @if ($item->type_img == '3B')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">3B</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px" style="display: block;">

        </div>
    @endif
@endforeach
</td>

<td rowspan="3" colspan="4"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align:center;">
{{-- 4B,4A,5 --}}
{{-- @php
        $isConditionMet = false;
    @endphp

    @foreach ($image as $item)
    @if ($item->type_img == '4A')
        <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image" height="40px"
            width="60px">
        @php
            $isConditionMet = true;
        @endphp
    @break

    @endif
    @endforeach

    @if (!$isConditionMet)
    @foreach ($image as $item)
    @if ($item->type_img == '4B')
        <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
            height="40px" width="60px">
        @php
            $isConditionMet = true;
        @endphp
    @break

    @endif
    @endforeach
    @endif

    @if (!$isConditionMet)
    @foreach ($image as $item)
    @if ($item->type_img == '5')
    <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
        height="40px" width="60px">
    @php
        $isConditionMet = true;
    @endphp
    @break

    @endif
    @endforeach
    @endif --}}

@foreach ($image as $item)
    @if ($item->type_img == '4A')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">4A</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px" style="display: block;">

        </div>
    @endif
@endforeach
{{-- 4A --}}
</td>
<td rowspan="3" colspan="4"
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt; text-align:center">
{{-- 5B ,7 --}}
{{-- @php
        $isConditionMet = false;
    @endphp

    @foreach ($image as $item)
    @if ($item->type_img == '5B')
        <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image" height="40px"
            width="60px">
        @php
            $isConditionMet = true;
        @endphp
    @break

    @endif
    @endforeach

    @foreach ($image as $item)
    @if ($item->type_img == '5A')
    <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image" height="40px"
        width="60px">
    @php
        $isConditionMet = true;
    @endphp
    @break

    @endif
    @endforeach
    @if (!$isConditionMet)
    @foreach ($image as $item)
    @if ($item->type_img == '7')
    <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
        height="40px" width="60px">
    @php
        $isConditionMet = true;
    @endphp
    @break

    @endif
    @endforeach
    @endif --}}
@foreach ($image as $item)
    @if ($item->type_img == '5')
        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center;">
                <span
                    style="background-color: rgba(255, 255, 255, 0.7); padding: 2px 5px; border-radius: 11px;">5</span>
            </div>
            <img src="data:image/png;base64, {{ $item->img_daily }}" alt="Daily Image"
                height="40px" width="60px" style="display: block;">

        </div>
    @endif
@endforeach
</td>
</tr>
<tr>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
<img src="{{ public_path('assets\img\avatar\minus.png') }}" width=10px" height="10px"
    alt="">
= Tidak Ada
</td>
</tr>
<tr>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); text-align: center; padding-right: 3pt; padding-left: 3pt;">
@foreach ($get_pic as $c)
    @if ($c->shift === 'A')
        {{ $c->name }}
    @break
@endif
@endforeach
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); text-align: center; padding-right: 3pt; padding-left: 3pt;">
@foreach ($get_pic as $c)
@if ($c->shift === 'B')
    {{ $c->name }}
@break
@endif
@endforeach
</td>
<td
style="border-width: 1px; border-style: solid;   font-size:10px; border-color: rgb(0, 0, 0); padding-right: 3pt; padding-left: 3pt;">
</td>
</tr>
</table>
