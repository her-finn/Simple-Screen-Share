async function newStream(){
    console.log("Starting new Stream");
    let stream = false;
    let code = null;
    try {
        /* stream = await navigator.mediaDevices.getUserMedia({audio: false, video: true});
        stream = await navigator.mediaDevices.getDisplayMedia({audio: false, video: true});*/
        var tmpStream = document.getElementById("tmpVideo");
        stream = tmpStream.captureStream(1);
        console.log("after stream");
        const p = new Peer({
            initiator: true,
            trickle: false,
            stream: stream
        });
        console.log("new peer");
        p.on('error',function(err){
            console.warn("Es gab einen Fehler: " + err);
            alert("Es gab einen Fehler - Mehr in der Console");
        });
        p.on('signal', data => {
            console.log('SIGNAL', JSON.stringify(data));
            $.ajax({
                method: "put",
                url: baseUrl + "/new",
                data: {"_token": csrf,"clientId":JSON.stringify(data)}
            }).done(function(resp){
                code = resp.id;
                alert("Code: " + code);
                console.log("Code: " + code);
            });
        });
        p.on('connect',function(){
            console.log("Erfolgreich verbunden");
            p.send("Pong - " + Math.random());
            stream = null;
        });
        p.on('data',function(data){
            console.log("Data: " + data);
        });
        p.on('stream', function (stream) {
            console.log("stream")
            var video = document.createElement('video')
            document.body.appendChild(video)
        
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
        console.warn("Es gab einen Fehler",err);
        alert("Es gab einen Fehler");
    }
}