const express = require ('express');
const ecommerceRouter = require('./ecommerceRoutes');
const passwordRouter = require('./passwordStrengthRoutes');

const app = express();
const port = 3000;

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.get('/', (req, res) =>{
    res.send("Check (/password/check-password) route for password and (/ecommerce/...) route for ecommerce")

});

app.use('/ecommerce',ecommerceRouter);
app.use('/password',passwordRouter);

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});
