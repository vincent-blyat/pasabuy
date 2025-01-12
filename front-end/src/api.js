import axios from 'axios';


export default axios.create({
    baseURL: `http://localhost:8000/`,
    headers: {
        'Content-Type': 'application/json',
    },
    xsrfCookieName: 'XSRF-TOKEN',
    xsrfHeaderName: 'X-XSRF-TOKEN',
    withCredentials: true
});