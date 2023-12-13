const express = require('express'); 
const bodyParser = require('body-parser'); 
const fs = require('fs').promises; 

const app = express();
const port = 3000;

app.use(bodyParser.json());

app.get('/', (req, res) =>{
    res.send("Use /readFile/file.txt, /writeFile/file.txt, /updateFile/file.txt");
});

app.get('/readFile/:filename', async (req, res) => {
    try {
        const { filename } = req.params;
        const data = await fs.readFile(filename, 'utf8');
        res.send(data);
    } catch (error) {
        res.status(404).send('File not found');
    }
});

app.post('/writeFile/:filename', async (req, res) => {
    try {
        const { filename } = req.params;
        const { data } = req.body;
    
        if (!data) {
            return res.status(400).send('No content in "data" field');
        }

        await fs.writeFile(filename, data, 'utf8');
        res.send('File written successfully');
        } catch (error) {
        res.status(500).send('Internal server error');
    }
});

app.put('/updateFile/:filename', async (req, res) => {
    try {
        const { filename } = req.params;
        const { data } = req.body;

        if (!data) {
            return res.status(400).send('No data in "content" field');
        }

        await fs.appendFile(filename, '\n' + data, 'utf8');
        res.send('File updated successfully');
    } catch (error) {
        res.status(500).send('Internal server error');
    }
});

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
    
});
