if(location.hash == "#newStream"){
    swal.fire("Your Stream Expired - Please restart","","info");
}
let p = null;
let ended = false;
async function newStream(){
    $("#newStreamBtn").attr("disabled",true);
    $("#newStreamBtn").html('<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>');
    console.log("Starting new Stream");
    let stream = false;
    let code = null;
    try {
        var tmpStream = document.getElementById("tmpVideo");
        stream = tmpStream.captureStream(1);
        p = new Peer({
            initiator: true,
            trickle: false,
            stream: stream
        });
        p.on('error',function(err){
            console.warn("An Error Occured: " + err);
            if(ended == false){
                swal.fire("An Error Occured","","error");
                $("#streamId").html('<h1 class="cover-heading text-center text-danger">An Error Occoured</h1>');
            }
        });
        p.on('signal', data => {
            console.log('SIGNAL', JSON.stringify(data));
            $.ajax({
                method: "put",
                url: baseUrl + "/new",
                data: {"_token": csrf,"clientId":JSON.stringify(data)}
            }).done(function(resp){
                code = resp.id;
                $("#streamId").html('<h1 class="cover-heading text-center">Your Stream-ID: <br> <b class="text-primary">' + code + '</b></h1><br><p class="lead text-center h5">Now open the Stream-Page ( <a href="' + baseUrl + '">' + baseUrl + '</a> ) and enter the Stream-ID. Alternatively, You can also scan the QR code below (Not for Mobile): <br><br><br> <div class="qr text-center"></div></p>');
                $(".qr").qrcode({width: 180,height: 180,text: baseUrl + "/stream/" + code});
                console.log("Code: " + code);
            });
        });
        p.on('connect',function(){
            console.log("Successfully Connected");
            p.send("Ping");
            stream = null;
        });
        p.on('data',function(data){
            if(data == "end"){
                $("#streamId").html('<h1 class="cover-heading text-center text-success">The Stream ended</h1><br><br><a onclick="location.reload();" class="ended">Go Back</a>');
                ended = true;
            }
            console.log("Data: " + data);
        });
        p.on('stream', function (stream) {
            console.log("stream")
            $("#streamId").html("");
            var video = document.createElement('video')
            $("#streamId").append(video)
            video.setAttribute('width',700);
            video.setAttribute('height','auto');
            video.setAttribute('id','streamVid');
            video.setAttribute('controls',true);
            video.srcObject = stream
            video.play()
        });
        var interval = setInterval(() => {
            if(code){
                $.ajax({
                    method: "get",
                    url: baseUrl + "/new/" + code + "/secondClientId",
                    data: {"_token": csrf}
                }).done(function(resps){
                    if(resps.error){
                        console.log("Stream expired - Redirecting");
                        location.href = baseUrl + "/new#newStream";
                        location.reload();
                    }
                    if(resps.valid != false){
                        p.signal(JSON.parse(resps.secondClientId));
                        clearInterval(interval);
                        console.log("Second Client Key accepted");
                    }else{
                        console.log("Waiting for Second Client Key");
                    }
                });
            }
        }, 1000);
    } catch(err) {
        console.warn("An Error Occured",err);
        swal.fire("An Error Occured","","error");
    }
}
var elem = document.getElementById("streamVid");
