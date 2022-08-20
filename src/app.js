const readUser = async () => {
    const { data } = await axios.get('http://localhost/index.php')
    return data
}

window.onload = async () => {
    const data = await readUser()
    console.log(data)
}
