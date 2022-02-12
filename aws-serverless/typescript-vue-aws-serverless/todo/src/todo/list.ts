import {
  APIGatewayProxyEvent,
  Context,
  Handler,
  APIGatewayProxyResult
} from "aws-lambda";
import { response } from "../common/helper";
import { dynamodb, TABLE_TODOS } from "../database/dynamodb";
import HttpStatusCode from "../common/httpStatusCode";
import { DocumentClient } from "aws-sdk/clients/dynamodb";

export const list: Handler = async (
  event: APIGatewayProxyEvent,
  _context: Context
): Promise<APIGatewayProxyResult> => {

  const q = event.queryStringParameters?event.queryStringParameters.q:null;

  const params: DocumentClient.ScanInput = {
    TableName: TABLE_TODOS,
    FilterExpression: "deletedAt = :val",
    ExpressionAttributeValues: {
      ":val": -1
    }
  };

  if (q) {
    params.FilterExpression += " and contains(task, :q)";
    params.ExpressionAttributeValues = { ":q": q, ...params.ExpressionAttributeValues}
  }

  let data: DocumentClient.ScanOutput;
  try {
    data = await dynamodb.scan(params).promise();
  } catch (e) {
    return response(HttpStatusCode.INTERNAL_SERVER_ERROR, {
      result: false,
      message: e.toString()
    });
  }

  return response(HttpStatusCode.OK, {
    result: true,
    data
  });
};
