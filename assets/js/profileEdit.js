const photo = document.getElementById('photo')
const image = document.getElementById('image')

photo.addEventListener('change', (e) => {
    if(e.target.files[0]){
        image.src = URL.createObjectURL(e.target.files[0])
    }
})