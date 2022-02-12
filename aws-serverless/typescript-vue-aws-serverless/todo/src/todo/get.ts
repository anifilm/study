import {
  APIGatewayProxyEvent,
  Context,
  Handler,
  APIGatewayProxyResult
} from "aws-lambda";
import { response } from "../common/helper";
import { dynamodb, TABLE_TODOS } from "../database/dynamodb";
import { DocumentClient } from "aws-sdk/clients/dynamodb";
import HttpStatusCode from "../common/httpStatusCode";

export const get: Handler = async (
  event: APIGatewayProxyEvent,
  _context: Context
): Promise<APIGatewayProxyResult> => {
  const id = event.pathParameters.id;

  const params: DocumentClient.GetItemInput = {
    TableName: TABLE_TODOS,
    Key: {
      id
    }
  };

  let data: DocumentClient.GetItemOutput;
  try {
    data = await dynamodb.get(params).promise();
  } catch (e) {
    return response(HttpStatusCode.INTERNAL_SERVER_ERROR, {
      result: false,
      message: e.toString()
    });
  }

  return response(HttpStatusCode.OK, {
    result: data.Item ? true : false,
    message: data.Item
      ? "완료"
      : "해당 아이디를 찾을 수 없습니다.",
    data
  });
};
