export interface ApiRequestOptions {
  url: string;
  method?: string;
  data?: Record<string, any>;
  customHeaders?: Record<string, string>;
}

export interface ApiResponse<T = any> {
  acl: Record<string, any>;
  meta: {
    success: boolean;
    code: number;
    messages: string[];
  };
  data: T;
}
