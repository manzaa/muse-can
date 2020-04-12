import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from  'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

	PHP_API_SERVER = "http://127.0.0.1:8080";
    constructor(private httpClient: HttpClient) { }
	readDetails(): Observable<Detail[]>{
    return this.httpClient.get<Detail[]>(`${this.PHP_API_SERVER}/api/read.php`);
  }
  createDetail(detail: Detail): Observable<Detail>{
    return this.httpClient.post<Detail>(`${this.PHP_API_SERVER}/api/create.php`, detail);
  }
    updateDetail(detail: Detail){
    return this.httpClient.put<Detail>(`${this.PHP_API_SERVER}/api/update.php`, detail);   
  }
    deleteDetail(id: number, menu){
    return this.httpClient.delete<Detail>(`${this.PHP_API_SERVER}/api/delete.php/?id=${id}&menu=${menu}`);
  }
}
