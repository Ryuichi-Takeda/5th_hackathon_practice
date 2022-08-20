'use strict';

const prefix = "http://localhost";
const userTable = document.getElementById('user_table');

const showUsers = async() => {
    const { data } = await getUsers();
    const arr = Object.entries(data);
    console.log(arr);
    arr.forEach((d) => {
        const data = d[1];
        const {name, age, id} = data;
        const table = `<tr><th>${name}</th><th>${age}</th><th>${id}</th></tr>`;
        userTable.insertAdjacentHTML('beforeend', table);
    });
}

const getUsers = async() => {
    const res = await axios.get(`${prefix}/index.php`);

    return {
        data: res.data,
        status: res.status
    };
}

showUsers();