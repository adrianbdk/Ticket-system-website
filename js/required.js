const title = document.getElementById('title')
const description = document.getElementById('description')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')


form.addEventListener('submit', (e) => {
    let messages = []
    if(title.value === '' || title.value == null ){
        messages.push('Title is required')
    }

    if(description.value === '' || description.value == null){
        messages.push('Description is required')
    }



    if(messages.length > 0){
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
})