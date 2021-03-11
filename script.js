let boxMessage = document.querySelector("#box-chat"); // div de display
let sendMessage = document.querySelector(".sendMessage"); //Button submit
let message = document.querySelector("#message"); //id du text area

sendMessage.addEventListener('click', function(event){
    event.preventDefault();

    let formData = new FormData()
    formData.append('message', message.value)
    fetch('index.php', {
        method:'post',
        body: formData
    }).then(()=>{
        message.value=""
        refresh()
    })
})

function refresh(){
    fetch("display-message.php").then((Response)=>{
        return Response.text()
    }).then((data)=>{
        boxMessage.innerHTML = data
    })
}

document.querySelector('.switch').addEventListener('click',(e)=>{

    if(e.target.checked){
      document.querySelector('body').classList.add('body-page')
      document.querySelector('.topnav').classList.add('dark-nav')
      document.querySelector('.topnav a').classList.add('dark-nav')
      document.querySelector('.message-section').classList.add('bg-dark')
      document.querySelector('.membre-section').classList.add('bg-dark')
      document.querySelector('.form-section').classList.add('bg-dark')
      document.querySelector('.textareaZone').classList.add('dark-textarea')
    }else{
      document.querySelector('body').classList.remove('body-page')
      document.querySelector('.topnav').classList.remove('dark-nav')
      document.querySelector('.topnav a').classList.remove('dark-nav')
      document.querySelector('.message-section').classList.remove('bg-dark')
      document.querySelector('.membre-section').classList.remove('bg-dark')
      document.querySelector('.form-section').classList.remove('bg-dark')
      document.querySelector('.textareaZone').classList.remove('dark-textarea')
    }
  })