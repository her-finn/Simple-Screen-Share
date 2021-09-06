async function getMedia() {
    let stream = null;
    try {
    stream = await navigator.mediaDevices.getDisplayMedia({audio: false, video: true});
    const p = new Peer({
      initiator: false,
      trickle: false,
      stream: stream
    });
  
    p.on('error', function(error){
        alert("Es gab einen Fehler");
        console.warn("Es gab einen Fehler",error);
    });
    
    /* Send to Server */
    p.on('signal', data => {
      console.log('SIGNAL', JSON.stringify(data))
      $.ajax({
          method: "post",
          url: baseUrl + "/stream/" + streamId,
          data: {"_token": csrf, "clientId": JSON.stringify(data)}
      }).done(function(data){
        if(data.error){
            alert("Es gab einen Fehler!");
            console.log("Fehler",data.description);
        }
      });
    });
  
    /* Get From Server */
    /*document.querySelector('form').addEventListener('submit', ev => {
      ev.preventDefault()
      p.signal(JSON.parse(document.querySelector('#incoming').value))
    })*/
    $.ajax({
        method: "get",
        url: baseUrl + "/stream/" + streamId + "/data",
    }).done(function(resp){
        p.signal(JSON.parse(resp.clientId));
    });
    p.on('connect', () => {
      console.log('CONNECT')
      p.send('Pong-Client: ' + Math.random())
    })
    p.on('data', data => {
      console.log('data: ' + data)
    })
  } catch(err) {
      console.log("Dat war wol nix mit dem Stream",err);
  }
}