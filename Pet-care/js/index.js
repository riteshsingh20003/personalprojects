const { MongoClient } = require('mongodb');

console.log("Index.js");

 
const uri = "mongodb://localhost:27017";

const client = new MongoClient(uri);

async function run() {
  try {
    await client.connect();
    console.log("Connected to MongoDB!");

    const db = client.db("de_project");
    const collection = db.collection("login_table");

    
    const result = await collection.insertOne({ name: "Alice", age: 25 });
    console.log("Inserted:", result.insertedId);

  } finally {
    await client.close();
  }
}

run().catch(console.dir);
