use('practicedb');

db.sales.insertOne({
  name:"Adewale",
  phone:"07061767554",
})


/* global use, db */
// MongoDB Playground
// To disable this template go to Settings | MongoDB | Use Default Template For Playground.
// Make sure you are connected to enable completions and to be able to run a playground.
// Use Ctrl+Space inside a snippet or a string literal to trigger completions.
// The result of the last command run in a playground is shown on the results panel.
// By default the first 20 documents will be returned with a cursor.
// Use 'console.log()' to print to the debug output.
// For more documentation on playgrounds please refer to
// https://www.mongodb.com/docs/mongodb-vscode/playgrounds/

// Select the database to use.
// use('practicedb');

// // Insert a few documents into the sales collection.
db.getCollection('sales').insertMany([
{"order_id":"1","order_date":"2017-01-07 10:55:05","order_amt":"2000","order_status":"1","order_customerid":"1"},
{"order_id":"2","order_date":"2017-03-02 10:55:24","order_amt":"1000","order_status":"1","order_customerid":"2"},
{"order_id":"3","order_date":"2017-03-04 10:55:43","order_amt":"6000","order_status":"1","order_customerid":"1"},
{"order_id":"4","order_date":"2017-03-04 10:55:57","order_amt":"2300","order_status":"1","order_customerid":"3"},
{"order_id":"5","order_date":"2017-03-05 10:56:09","order_amt":"1500","order_status":"0","order_customerid":"2"},
{"order_id":"6","order_date":"2017-03-06 10:56:19","order_amt":"600","order_status":"0","order_customerid":"4"},
{"order_id":"7","order_date":"2017-03-07 10:57:27","order_amt":"4900","order_status":"1","order_customerid":"5"},
{"order_id":"8","order_date":"2017-02-07 10:57:47","order_amt":"7230","order_status":"1","order_customerid":"3"},
{"order_id":"9","order_date":"2017-01-07 11:12:09","order_amt":"2750","order_status":"1","order_customerid":"6"}
]);

// // Run a find command to view items sold on April 4th, 2014.
// const salesOnApril4th = db.getCollection('sales').find({
//   date: { $gte: new Date('2014-04-04'), $lt: new Date('2014-04-05') }
// }).count();

// // Print a message to the output window.
// console.log(`${salesOnApril4th} sales occurred in 2014.`);

// // Here we run an aggregation and open a cursor to the results.
// // Use '.toArray()' to exhaust the cursor to return the whole result set.
// // You can use '.hasNext()/.next()' to iterate through the cursor page by page.
// db.getCollection('sales').aggregate([
//   // Find all of the sales that occurred in 2014.
//   { $match: { date: { $gte: new Date('2014-01-01'), $lt: new Date('2015-01-01') } } },
//   // Group the total sales for each product.
//   { $group: { _id: '$item', totalSaleAmount: { $sum: { $multiply: [ '$price', '$quantity' ] } } } }
// ]);
