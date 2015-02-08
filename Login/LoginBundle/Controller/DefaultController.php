<?php

namespace Login\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Login\LoginBundle\Entity\Users;
use Login\LoginBundle\Entity\Hall;
use Login\LoginBundle\Modals\Login;
use Login\LoginBundle\Entity\Student;
use Login\LoginBundle\Entity\Room;
use Login\LoginBundle\Entity\Occupy;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('LoginLoginBundle:Users');
        if ($request->getMethod() == 'POST') {
            $session->clear();
            $username = $request->get('username');
            $password = sha1($request->get('password'));
            $remember = $request->get('remember');
            $user = $repository->findOneBy(array('userName' => $username, 'password' => $password));
            if ($user) {
                if ($remember == 'remember-me') {
                    $login = new Login();
                    $login->setUsername($username);
                    $login->setPassword($password);
                    $session->set('login', $login);
                }
                return $this->render('LoginLoginBundle:Default:welcome.html.twig', array('name' => $user->getFirstName()));
            } else {
                return $this->render('LoginLoginBundle:Default:login.html.twig', array('name' => 'Login Error'));
            }
        } else {
            if ($session->has('login')) {
                $login = $session->get('login');
                $username = $login->getUsername();
                $password = $login->getPassword();
                $user = $repository->findOneBy(array('userName' => $username, 'password' => $password));
                if ($user) {
                    $page = $request->get('page');
                    $count_per_page = 50;
                    $total_count = $this->getTotalCountries();
                    $total_pages = ceil($total_count / $count_per_page);

                    if (!is_numeric($page)) {
                        $page = 1;
                    } else {
                        $page = floor($page);
                    }
                    if ($total_count <= $count_per_page) {
                        $page = 1;
                    }
                    if (($page * $count_per_page) > $total_count) {
                        $page = $total_pages;
                    }
                    $offset = 0;
                    if ($page > 1) {
                        $offset = $count_per_page * ($page - 1);
                    }
                    $em = $this->getDoctrine()->getEntityManager();
                    $ctryQuery = $em->createQueryBuilder()
                            ->select('c')
                            ->from('LoginLoginBundle:Country', 'c')
                            ->setFirstResult($offset)
                            ->setMaxResults($count_per_page);
                    $ctryFinalQuery = $ctryQuery->getQuery();

                    $countries = $ctryFinalQuery->getArrayResult();
                    return $this->render('LoginLoginBundle:Default:welcome.html.twig', array('name' => $user->getFirstName(), 'countries' => $countries, 'total_pages' => $total_pages, 'current_page' => $page));
                }
            }
            return $this->render('LoginLoginBundle:Default:login.html.twig');
        }
    }

    public function getTotalCountries() {
        $em = $this->getDoctrine()->getEntityManager();
        $countQuery = $em->createQueryBuilder()
                ->select('Count(c)')
                ->from('LoginLoginBundle:Country', 'c');
        $finalQuery = $countQuery->getQuery();
        $total = $finalQuery->getSingleScalarResult();
        return $total;
    }

    public function signupAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $username = $request->get('username');
            $firstname = $request->get('firstname');
            $password = $request->get('password');

            $user = new Users();
            $user->setFirstName($firstname);
            $user->setPassword(sha1($password));
            $user->setUserName($username);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:signup.html.twig');
    }

    public function logoutAction(Request $request) {
        $session = $this->getRequest()->getSession();
        $session->clear();
        return $this->render('LoginLoginBundle:Default:login.html.twig');
    }

    public function uosAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('LoginLoginBundle:Users');

        if ($request->getMethod() == 'POST') {

            $user_id = $request->get('user_id');
            $password = $request->get('password');

            $user = $repository->findOneBy(array('user' => $user_id, 'password' => $password));
            if ($user) {
                return $this->render('LoginLoginBundle:Default:home.html.twig', array('name' => $user->getUser()));
            } else {
                return $this->render('LoginLoginBundle:Default:login.html.twig', array('name' => 'Login Error'));
            }
        }
        return $this->render('LoginLoginBundle:Default:uos.html.twig');
    }

    public function homeAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $userID = $request->get('userID');
            $password = sha1($request->get('password'));



            $user = new Users();
            $user->setFirstName($firstname);
            $user->setPassword(sha1($password));
            $user->setUserName($username);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:home.html.twig');
    }

    public function addstudentAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $studentno = $request->get('studentno');
            $firstname = $request->get('firstname');
            $lastname = $request->get('lastname');
            $gender = $request->get('gender');
            $deptName = $request->get('dept');
            $year = $request->get('year');

            $student = new Student();
            $student->setStudentid($studentno);
            $student->setFirstname($firstname);
            $student->setLastname($lastname);
            $student->setGender($gender);
            $student->setDeptName($deptName);
            $student->setYear($year);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($student);
            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:addstudent.html.twig');
    }

    public function roomaddAction(Request $request) {

        if ($request->getMethod() == 'POST') {
            $roomno = $request->get('roomno');
            $type = $request->get('type');
            $hallname = $request->get('hallname');
            $cost = $request->get('cost');

            $room = new Room();
            $room->setRoomno($roomno);
            $room->setHallname($hallname);
            $room->setType($type);
            $room->setMonthlycost($cost);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($room);
            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:roomadd.html.twig');
    }

    public function roomeditAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $hallname = $request->get('hallname');
            $roomno = $request->get('roomno');
            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('LoginLoginBundle:Room');

            $room = $repository->findOneBy(array('roomno' => $roomno, 'hallname' => $hallname));

            if ($room) {
                return $this->render('LoginLoginBundle:Default:roomeditf.html.twig', array('indnum' => $room->getIndnum(), 'roomno' => $room->getRoomno(), 'hallname' => $room->getHallname(), 'type' => $room->getType(), 'cost' => $room->getMonthlycost()));
            } else {
                return $this->render('LoginLoginBundle:Default:uos.html.twig', array('name' => 'Login Error'));
            }
        }
        return $this->render('LoginLoginBundle:Default:roomedit.html.twig');
    }

    public function halladdAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $hallname = $request->get('hallname');
            $capacity = $request->get('capacity');
            $gender = $request->get('gender');
            $hall = new Hall();
            $hall->setHallname($hallname);
            $hall->setCapacity($capacity);
            $hall->setGender($gender);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($hall);
            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:halladd.html.twig');
    }

    public function halleditAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $hallname = $request->get('hallname');

            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('LoginLoginBundle:Hall');



            $hall = $repository->findOneBy(array('hallname' => $hallname));
            if ($hall) {
                return $this->render('LoginLoginBundle:Default:halleditf.html.twig', array('indnum' => $hall->getIndnum(), 'hallname' => $hall->getHallname(), 'capacity' => $hall->getCapacity(), 'gender' => $hall->getGender()));
            } else {
                return $this->render('LoginLoginBundle:Default:uos.html.twig', array('name' => 'Login Error'));
            }
        }
        return $this->render('LoginLoginBundle:Default:halledit.html.twig');
    }

    public function halleditfAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $indnum = $request->get('indnum');
            $hallname = $request->get('hallname');
            $capacity = $request->get('capacity');
            $gender = $request->get('gender');

            $em = $this->getDoctrine()->getManager();
            $hall = $em->getRepository('LoginLoginBundle:Hall')->find($indnum);

            if ($hallname != null) {
                $hall->setHallname($hallname);
            }
            if ($capacity != null) {
                $hall->setCapacity($capacity);
            }
            if ($gender != null) {
                $hall->setGender($gender);
            }
            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:login.html.twig', array('name' => $indnum));
    }

    public function halldeleteAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $hallname = $request->get('hallname');

            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('LoginLoginBundle:Hall');

            $hall = $repository->findOneBy(array('hallname' => $hallname));
            if ($hall) {
                $hallO = $repository->find($hall->getIndnum());
                $em->remove($hallO);
                $em->flush();

                return $this->render('LoginLoginBundle:Default:halldelete.html.twig');
            } else {
                return $this->render('LoginLoginBundle:Default:uos.html.twig', array('name' => 'Login Error'));
            }
        }
        return $this->render('LoginLoginBundle:Default:halldelete.html.twig');
    }

    public function roomdeleteAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $hallname = $request->get('hallname');
            $roomno = $request->get('roomno');

            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('LoginLoginBundle:Room');

            $room = $repository->findOneBy(array('hallname' => $hallname, 'roomno' => $roomno));
            if ($room) {

                $roomO = $repository->find($room->getIndnum());
                $em->remove($roomO);
                $em->flush();

                return $this->render('LoginLoginBundle:Default:roomdelete.html.twig');
            } else {
                return $this->render('LoginLoginBundle:Default:uos.html.twig', array('name' => 'Login Error'));
            }
        }
        return $this->render('LoginLoginBundle:Default:roomdelete.html.twig');
    }

    public function roomeditfAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $indnum = $request->get('indnum');
            $hallname = $request->get('hallname');
            $roomno = $request->get('roomnum');
            $type = $request->get('type');
            $cost = $request->get('cost');

            $em = $this->getDoctrine()->getManager();
            $room = $em->getRepository('LoginLoginBundle:Room')->find($indnum);

            if ($hallname != null) {
                $room->setHallname($hallname);
            }
            if ($roomno != null) {
                $room->setRoomno($roomno);
            }
            if ($type != null) {
                $room->setType($type);
            }
            if ($cost != null) {
                $room->setMonthlyCost($cost);
            }
            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:login.html.twig', array('name' => $indnum));
    }

    public function occupyAddAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $hallname = $request->get('hallname');
            $capacity = $request->get('capacity');
            $gender = $request->get('gender');
            $hall = new Hall();
            $hall->setHallname($hallname);
            $hall->setCapacity($capacity);
            $hall->setGender($gender);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($hall);
            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:occupyAdd.html.twig');
    }

    public function occupyeditAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $studentno = $request->get('studno');

            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('LoginLoginBundle:Occupy');



            $occupy = $repository->findOneBy(array('studentno' => $studentno));
            if ($occupy) {
                return $this->render('LoginLoginBundle:Default:occupyeditf.html.twig', array('indnum' => $occupy->getIndnum(), 'studno' => $studentno, 'hallname' => $occupy->getHallname(), 'roomno' => $occupy->getRoomno(), 'date' => $occupy->getDate(), 'lastedit' => $occupy->getLastedit()));
            } else {
                return $this->render('LoginLoginBundle:Default:uos.html.twig', array('name' => 'Login Error'));
            }
        }
        return $this->render('LoginLoginBundle:Default:occupyedit.html.twig');
    }

    public function occupyeditfAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $indnum = $request->get('indnum');
            $hallname = $request->get('hallname');
            $roomno = $request->get('roomno');

            $em = $this->getDoctrine()->getManager();
            $occupy = $em->getRepository('LoginLoginBundle:Occupy')->find($indnum);

            if ($hallname != null) {
                $occupy->setHallname($hallname);
            }
            if ($roomno != null) {
                $occupy->setRoomno($roomno);
            }
            $date = DateTime::createFromFormat('j-M-Y', '15-Feb-2009');
            $date->format('Y-m-d');
            $occupy->setDate($date);
            
            $lastedit = DateTime::createFromFormat('j-M-Y', '15-Feb-2009');
            $lastedit->format('Y-m-d');            
            $occupy->setLastedit($lastedit);
            

            $occupy->setLastedit($lastedit);

            $em->flush();
        }
        return $this->render('LoginLoginBundle:Default:login.html.twig', array('name' => $indnum));
    }

    public function occupydeleteAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $studentno = $request->get('studno');

            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('LoginLoginBundle:Occupy');

            $occupy = $repository->findOneBy(array('studentno' => $studentno));
            if ($occupy) {

                $occupy0 = $repository->find($occupy->getIndnum());
                $em->remove($occupyO);
                $em->flush();

                return $this->render('LoginLoginBundle:Default:occupydelete.html.twig');
            } else {
                return $this->render('LoginLoginBundle:Default:uos.html.twig', array('name' => 'Login Error'));
            }
        }
        return $this->render('LoginLoginBundle:Default:occupydelete.html.twig');
    }

}
