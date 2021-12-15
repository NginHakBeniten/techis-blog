import BaseRequest from "./base_request";

class AuthRequest extends BaseRequest {
    login(data) {
        return this.performRequest(BaseRequest.METHOD_POST, "login", data);
    }
    logout() {
        return this.performRequest(BaseRequest.METHOD_POST, "logout");
    }
}

export default new AuthRequest("auth");
