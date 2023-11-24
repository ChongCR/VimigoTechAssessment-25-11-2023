const axios = require('axios');

const token = 'YOUR_ACCESS_TOKEN';

axios.get('/api/some_endpoint', {
    headers: {
        'Authorization': `Bearer ${token}`
    }
})
    .then(response => {
        // Handle the API response
    })
    .catch(error => {
        // Handle errors
    });
