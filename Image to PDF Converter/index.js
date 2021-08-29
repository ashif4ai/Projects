let elResult = document.getElementById('result')
let btn = document.getElementById('btn')
let wait = document.getElementById('wait')
let elResultLink = document.getElementById('resultLink')
elResult.style.display = 'none'
wait.style.display = 'none'
btn.style.display = 'none'

// On file input change, start conversion
document.getElementById('form').addEventListener('submit', e => {
    e.preventDefault();
    elResult.style.display = 'none'
    wait.style.display = 'block'
    // document.documentElement.style.cursor = 'wait'
    ConvertApi.worker(new URL('https://worker.convertapi.com/user/100000001/worker/any-to-pdf'), e.currentTarget)
        .then(r => r.json())
        .then(files => {
            elResultLink.innerText = files[0].FileName
            elResultLink.setAttribute('href', files[0].Url)
            // elResult.style.display = 'block'
            wait.style.display = 'none'

            document.location.href = files[0].Url; 
        })
        .finally(() => document.documentElement.style.cursor = 'default')
})
function show(){

    btn.style.display = 'block'


};