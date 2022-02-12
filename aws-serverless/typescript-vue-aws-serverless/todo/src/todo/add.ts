import {
  APIGatewayProxyEvent,
  Context,
  Handler,
  APIGatewayProxyResult
} from "aws-lambda";
import { response } from "../common/helper";
import { dynamodb, TABLE_TODOS } from "../database/dynamodb";
import { v4 as uuid } from "uuid";
import HttpStatusCode from "../common/httpStatusCode";

export const add: Handler = async (
  event: APIGatewayProxyEvent,
  _context: Context
): Promise<APIGatewayProxyResult> => {
  const input = JSON.parse(event.body);

  const now = new Date().toISOString();
  const data: ITodo = {
    id: uuid(),
    deletedAt: -1,
    createdAt: now,
    isCompleted: false,
    task: input.task
  };

  try {
    await dynamodb
      .put({
        TableName: TABLE_TODOS,
        Item: data
      })
      .promise();
  } catch (e) {
    return response(HttpStatusCode.INTERNAL_SERVER_ERROR, {
      result: false,
      message: e.toString()
    });
  }

  return response(HttpStatusCode.OK, {
    result: true,
    message: "작업 등록 완료",
    data
  });
};
