import axios from "axios";

export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials) 
        .then((response) => {
            res(response.data);
        })
        .catch((error) => {
            rej("wrong account details");
        })
    })   
}

export function getUser() {
    const userStr = localStorage.getItem("user");

    if (!userStr) {
        return null;
    }
    return JSON.parse(userStr);
}