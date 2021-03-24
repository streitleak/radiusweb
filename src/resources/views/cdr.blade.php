@extends('radiuscdr::layouts.app')
@section('leftcolumn')
    Side Bar
@endsection
@section('content')
<form name="search" id="search" method="post" action="/cdr{{ $page }}">
    <table class="search">
        <tr>
            <td>Start Time:</td><td><input name="starttime" id="starttime" type="text" value="{{ $starttime }}"></td><td>Stop Time:</td><td><input name="stoptime" id="stoptime" type="text" value="{{ $stoptime }}"></td>
        </tr>
        <tr>
            <td>Calling Number:</td><td><input name="calling" id="calling" type="text" value="{{ $calling }}"></td><td>Called Number:</td><td><input name="called" id="called" value="{{ $called }}" type="text"></td>
        </tr>
        <tr>
            <td>Duration:</td><td><input name="duration" id="duration" type="checkbox" {{ $duration }}></td><td><input type="submit" value="search"><input id="reset" type="button" value="clear"></td><td>@csrf</td>
    </table>    
<table>
    <thead>
        <th>ID</th>
        <th>GW</th>
        <th>NET-Setup-Time</th>
        <th>NET-Alert-Time</th>
        <th>NET-Connect-Time</th>
        <th>NET-Disconnect-Time</th>
        <th>NET-Call-Type</th>
        <th>NET-Call-Origin</th>
        <th>NET-Calling-Number</th>
        <th>NET-Called-Number</th>
        <th>NET-Call-Duration</th>
        <th>NET-Disconnect-Cause</th>
        <th>NET-Abort-Cause</th>
        <th>NET-Ingress-Local-Addr</th>
        <th>NET-Ingress-Remote-Addr</th>
        <th>NET-Egress-Local-Addr</th>
        <th>NET-Egress-Remote-Addr</th>
    </thead>
    <tbody>
    @foreach($cdrs as $cdr)    
        <tr>              
            <td>{{ $cdr->radacctid }}</td>
            <td>{{ $cdr->nasipaddress }}</td>
            <td>{{ date('Y-m-d H:i:s', $cdr->netsetuptime) }}</td>
            <td>{{ $cdr->netalerttime > 0 ? date('Y-m-d H:i:s',  $cdr->netalerttime):"" }}</td>
            <td>{{ $cdr->netconnecttime > 0 ? date('Y-m-d H:i:s',  $cdr->netconnecttime):"" }}</td>
            <td>{{ $cdr->netdisconnecttime > 0 ? date('Y-m-d H:i:s',  $cdr->netdisconnecttime):"" }}</td>
            <td>{{ $cdr->netcalltype }}</td>
            <td>{{ $cdr->netcallorigin }}</td>
            <td>{{ $cdr->netcallingnumber }}</td>
            <td>{{ $cdr->netcallednumber }}</td>
            <td>{{ $cdr->netcallduration }}</td>
            <td>{{ $cdr->netdisconnectcause }}</td>
            <td>{{ $cdr->netabortcause }}</td>
            <td>{{ $cdr->netingresslocaladdr }}</td>
            <td>{{ $cdr->netingressremoteaddr }}</td>
            <td>{{ $cdr->netegresslocaladdr }}</td>
            <td>{{ $cdr->netegressremoteaddr }}</td>
            <td id=cdrdetail>
                <table>
                    <thead>
                        <th>NET-Fwd-Packets</th>
                        <th>NET-Fwd-RTCP-Packets-Lost</th>
                        <th>NET-Fwd-RTCP-Avg-Jitter</th>
                        <th>NET-Fwd-RTP-Avg-Latency</th>
                        <th>NET-Fwd-RTCP-MaxJitter</th>
                        <th>NET-Fwd-RTP-MaxLatency</th>
                        <th>NET-Fwd-RTP-Packets-Lost</th>
                        <th>NET-Fwd-RTP-Avg-Jitter</th>
                        <th>NET-Fwd-RTP-MaxJitter</th>
                        <th>NET-Bwd-Packets</th>
                        <th>NET-Bwd-RTCP-Packets-Lost</th>                                    
                        <th>NET-Bwd-RTCP-Avg-Jitter</th>
                        <th>NET-Bwd-RTP-Avg-Latency</th>
                        <th>NET-Bwd-RTCP-MaxJitter</th>
                        <th>NET-Bwd-RTP-MaxLatency</th>
                        <th>NET-Bwd-RTP-Packets-Lost</th>
                        <th>NET-Bwd-RTP-Avg-Jitter</th>
                        <th>NET-Bwd-RTP-MaxJitter</th>
                    </thead>
                    <tr>
                        <td>{{ $cdr->netfwdpackets }}</td>
                        <td>{{ $cdr->netfwdrtcppacketslost }}</td>
                        <td>{{ $cdr->netfwdrtcpavgjitter }}</td>
                        <td>{{ $cdr->netfwdrtpavglatency }}</td>
                        <td>{{ $cdr->netfwdrtcpmaxjitter }}</td>
                        <td>{{ $cdr->netfwdrtpmaxlatency }}</td>
                        <td>{{ $cdr->netfwdrtppacketslost }}</td>
                        <td>{{ $cdr->netfwdrtpavgjitter }}</td>
                        <td>{{ $cdr->netfwdrtpmaxjitter }}</td>
                        <td>{{ $cdr->netbwdpackets }}</td>
                        <td>{{ $cdr->netbwdrtcppacketslost }}</td>
                        <td>{{ $cdr->netbwdrtcpavgjitter }}</td>
                        <td>{{ $cdr->netbwdrtpavglatency }}</td>
                        <td>{{ $cdr->netbwdrtcpmaxjitter }}</td>
                        <td>{{ $cdr->netbwdrtpmaxlatency }}</td>
                        <td>{{ $cdr->netbwdrtppacketslost }}</td>
                        <td>{{ $cdr->netbwdrtpavgjitter }}</td>
                        <td>{{ $cdr->netbwdrtpmaxjitter }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="17">
                <div class="links">{{ $cdrs->links() }}</div>
            </td>
        </tr>
    <tfoot>
</table>
</form>
<div id="detail_show"></div>
@endsection
