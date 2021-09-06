async function getMedia() {
      let stream = null;
      try {
      /*stream = await navigator.mediaDevices.getUserMedia({audio: false, video: true});*/
      stream = await navigator.mediaDevices.getDisplayMedia({audio: false, video: true});
      const p = new Peer({
        initiator: location.hash === '#1',
        trickle: false,
        stream: stream
      })
    
      p.on('error', err => console.log('error', err))
    
      p.on('signal', data => {
        console.log('SIGNAL', JSON.stringify(data))
        document.querySelector('#outgoing').textContent = JSON.stringify(data)
        $("#code").qrcode(JSON.stringify(data));
      })
    
      document.querySelector('form').addEventListener('submit', ev => {
        ev.preventDefault()
        p.signal(JSON.parse(document.querySelector('#incoming').value))
      })
    
      p.on('connect', () => {
        console.log('CONNECT')
        p.send('whatever' + Math.random())
      })
    
      p.on('data', data => {
        console.log('data: ' + data)
      })
      p.on('stream', function (stream) {
        console.log("stream")
        var video = document.createElement('video')
        document.body.appendChild(video)
    
        video.srcObject = stream
        video.play()
    })
    } catch(err) {
        console.log("Dat war wol nix mit dem Stream",err);
    }
  }
