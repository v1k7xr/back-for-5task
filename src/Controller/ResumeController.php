<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Resume;
use App\Repository\ResumeRepository;

class ResumeController extends AbstractController
{

    public function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
    }

    /**
     * @Route("/resume", name="resume")
     */
    public function index(): Response
    {
        return $this->render('resume/index.html.twig', [
            'controller_name' => 'ResumeController',
        ]);
    }

    /**
     * @Route("/api/cv", name="get_resume_list", methods={"GET"})
     */
    public function getResumeList(): JsonResponse
    {
        $resumeList = $this->resumeRepository->findAll();
        $data = [];

        foreach ($resumeList as $resume) {
            $data[] = [
                $resume->toArray(),
            ];
        }

        return new JsonResponse(['resumeList' => $data], Response::HTTP_OK);
    }

    /**
     * @Route("/api/cv/{id}", name="get_resume_by_id", methods={"GET"})
     */
    public function getResumeById($id): JsonResponse
    {
        $resume = $this->resumeRepository->findOneBy(['id' => $id]);

        if (!$resume) {
            return new JsonResponse(['error' => 'not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $resume->toArray();

        return new JsonResponse(['resume' => $data], Response::HTTP_OK);
    }

    /**
     * @Route("/api/cv/add", name="add_resume", methods={"POST"})
     */
    public function addResume(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        return new JsonResponse(['resume' => $data], Response::HTTP_OK);
    }

    /**
     * @Route("/api/cv/{id}/status/update", name="change_resume_status", methods={"POST"})
     */
    public function changeResumeStatus($id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $entityManager = $this->getDoctrine()->getManager();
        $resume = $entityManager->getRepository(Resume::class)->find($id);

        if (!$resume) {
            return new JsonResponse(['updated' => 'false'], Response::HTTP_NOT_FOUND);
        }

        $resume->setResumeStatus($data['new_status']);
        $entityManager->flush();
        
        return new JsonResponse(['updated' => $data], Response::HTTP_OK);
    }
}
