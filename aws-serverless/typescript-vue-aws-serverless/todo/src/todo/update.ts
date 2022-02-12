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

export const update: Handler = async (
  event: APIGatewayProxyEvent,
  _context: Context
): Promise<APIGatewayProxyResult> => {
  const input = JSON.parse(event.body);

  const params: DocumentClient.UpdateItemInput = {
    TableName: TABLE_TODOS,
    Key: {
      id: input.id
    }
  };

  const expressions: string[] = [];
  const values: any = {};
  for (let key in input.updates) {
    expressions.push(`${key} = :${key}`);
    values[`:${key}`] = input.updates[key];
  }
  const exp = "SET " + expressions.join(", ");
  params.UpdateExpression = exp;
  params.ExpressionAttributeValues = values;

  let data: DocumentClient.UpdateItemOutput;
  try {
    data = await dynamodb.update(params).promise();
  } catch (e) {
    return response(HttpStatusCode.INTERNAL_SERVER_ERROR, {
      result: false,
      message: e.toString()
    });
  }

  return response(HttpStatusCode.OK, {
    result: true,
    message: "성공",
    data
  });
};
