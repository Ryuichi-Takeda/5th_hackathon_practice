const readUser = async () => {
  const { data } = await axios.get('http://localhost/modules/api/users.php')
  return data
}

handleCreateUser = async () => {
  const username = document.getElementsByName('username')[0].value
  const age = document.getElementsByName('age')[0]. value
  const res = await createUser(username, age)
  console.log(res.data)
  await drawHTML()
}

const createUser = async (username, age) => {
  const params = {
    username: username,
    age: age,
  }
  const res = await axios.get('http://localhost/modules/api/create_user.php', {
    params: params,
  })
  return res
}

const drawHTML = async () => {
  const res = await readUser()
  const data = Object.entries(res).map((d) => d[1])
  let result = ``
  data.forEach((element) => {
    const { name, age, id } = element
    let text = `
        <td class="name">${name}</td>
        <td class="age">${age}</td>
        <td class="id">${id}</td>`
    result += text
  })
  let target = document.getElementById('draw_point')
  target.innerHTML = result
}

window.onload = async () => {
  drawHTML()
  let createUserButton = document.getElementById('create_user_button')
  createUserButton.addEventListener('click', handleCreateUser)
}
