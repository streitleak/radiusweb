<div class=blueTable>
    <div class="css_header">
        <div class="css_cell">NET-Fwd-Packets</div>
        <div class="css_cell">NET-Fwd-RTCP-Packets-Lost</div>
        <div class="css_cell">NET-Fwd-RTCP-Avg-Jitter</div>
        <div class="css_cell">NET-Fwd-RTP-Avg-Latency</div>
        <div class="css_cell">NET-Fwd-RTCP-MaxJitter</div>
        <div class="css_cell">NET-Fwd-RTP-MaxLatency</div>
        <div class="css_cell">NET-Fwd-RTP-Packets-Lost</div>
        <div class="css_cell">NET-Fwd-RTP-Avg-Jitter</div>
        <div class="css_cell">NET-Fwd-RTP-MaxJitter</div>
        <div class="css_cell">NET-Bwd-Packets</div>
        <div class="css_cell">NET-Bwd-RTCP-Packets-Lost</div>
        <div class="css_cell">NET-Bwd-RTCP-Avg-Jitter</div>
        <div class="css_cell">NET-Bwd-RTP-Avg-Latency</div>
        <div class="css_cell">NET-Bwd-RTCP-MaxJitter</div>
        <div class="css_cell">NET-Bwd-RTP-MaxLatency</div>
        <div class="css_cell">NET-Bwd-RTP-Packets-Lost</div>
        <div class="css_cell">NET-Bwd-RTP-Avg-Jitter</div>
        <div class="css_cell">NET-Bwd-RTP-MaxJitter</div>
    </div>
    <div class="css_body">
        <div class="css_row">
            <div class="css_cell">{{ $cdr->{'NET-Fwd-Packets'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Fwd-RTCP-Packets-Lost'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Fwd-RTCP-Avg-Jitter'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Fwd-RTP-Avg-Latency'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Fwd-RTCP-MaxJitter'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Fwd-RTP-MaxLatency'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Fwd-RTP-Packets-Lost'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Fwd-RTP-Avg-Jitter'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Fwd-RTP-MaxJitter'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-Packets'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-RTCP-Packets-Lost'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-RTCP-Avg-Jitter'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-RTP-Avg-Latency'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-RTCP-MaxJitter'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-RTP-MaxLatency'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-RTP-Packets-Lost'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-RTP-Avg-Jitter'} }}</div>
            <div class="css_cell">{{ $cdr->{'NET-Bwd-RTP-MaxJitter'} }}</div>
        </div>
    </div>
</div>
