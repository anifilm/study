import HttpStatusCode from "./httpStatusCode";
import { APIGatewayProxyResult } from 'aws-lambda';

const response = (status: HttpStatusCode, data: IResponseBody): APIGatewayProxyResult => {
  return {
    statusCode: status,
    headers: {
      "Access-Control-Allow-Origin": "*",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data)
  }
}

export { response };