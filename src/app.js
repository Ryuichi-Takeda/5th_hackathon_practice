const readUser = async () => {
  const { data } = await axios.get("http://localhost/modules/api/users.php");
  return data;
};

const drawHTML = async () => {
  const res = await readUser();
  const data = Object.entries(res).map(d => d[1])
  let result = ``;
  data.forEach((element) => {
    const { name, age, id } = element;
    let text = `
        <td class="name">${name}</td>
        <td class="age">${age}</td>
        <td class="id">${id}</td>`;
    result += text;
  });
  let target = document.getElementById("draw_point");
  target.innerHTML = result;
};

window.onload = async () => {
  drawHTML();
};
