import mongoose from 'mongoose';

const userId = process.env.USER_ID;
const userPw = process.env.USER_PW;

const uri = `mongodb+srv://${userId}:${userPw}@cluster0.ehk3h.mongodb.net/nextjsNotesApp?retryWrites=true&w=majority`;

const connection = {};

async function dbConnect() {
  if (connection.isConnected) return;

  const db = await mongoose.connect(uri, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
  });

  connection.isConnected = db.connections[0].readyState;
  console.log("connecting MongoDB...");
}

export default dbConnect;
