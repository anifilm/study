import * as AWS from "aws-sdk";
import { ServiceConfigurationOptions } from "aws-sdk/lib/service";

const DB_PREFIX = process.env.DB_PREFIX;
const TABLE_TODOS = DB_PREFIX + "todos"

const dynamodbOfflieOptions: ServiceConfigurationOptions = {
  endpoint: "http://localhost:8000"
};

const isOffline = () => process.env.NODE_DEV === "development";

const dynamodb: AWS.DynamoDB.DocumentClient = isOffline()
  ? new AWS.DynamoDB.DocumentClient(dynamodbOfflieOptions)
  : new AWS.DynamoDB.DocumentClient();

export { dynamodb, DB_PREFIX, TABLE_TODOS };
